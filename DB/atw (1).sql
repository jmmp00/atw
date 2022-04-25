-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Abr-2022 às 00:47
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `relations`
--

CREATE TABLE `relations` (
  `id1` int(11) NOT NULL,
  `id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(50) NOT NULL,
  `verification` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `terms`
--

INSERT INTO `terms` (`id`, `title`, `description`, `timestamp`, `username`, `verification`) VALUES
(1, 'movie', 'a cinema film.', '2022-04-10 22:21:32', 'olá', 1),
(2, 'joana', 'amazing person', '2022-04-10 22:21:05', 'juju', 1),
(3, 'rocha', 'rock', '2022-03-25 16:27:05', 'juju', NULL),
(4, 'telmo', 'tour eiffel', '2022-03-22 16:31:20', 'juju', NULL),
(7, 'qweqwe', 'qweqweqeqeqw', '2022-03-22 16:32:12', 'juju', NULL),
(9, 'rfd', 'dsfsfsdf', '2022-03-22 16:33:30', 'juju', NULL),
(11, 'weqeee', 'ffsdffdf', '2022-03-27 16:24:19', 'juju', NULL),
(12, 'âmbar', 'orange cat', '2022-04-10 22:21:12', 'juju', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_level` tinyint(1) DEFAULT 0,
  `avatar` blob NOT NULL,
  `code` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `username`, `password`, `user_level`, `avatar`, `code`, `token`, `status`) VALUES
(6, 'Pedro', 'Rocha', 'pedrofiliperocha2001@gmail.com', 'rock', '$2y$10$x0vMafUEQykT16dXp8qA.uqaOqRtHehL6IfNTomnVJmFGUCC4.J7y', 0, '', '', 'TESTE', 1),
(7, 'Joana', 'Pinheiro', 'joana_mafalda_magalhaes@hotmail.com', 'juju', '$2y$10$6lM984aoQf2nlWZE.Beng.BZy3j4US7J2h5IgU1NLDZive2o8HOAO', 1, 0xffd8ffe100224578696600004d4d002a00000008000101120003000000010001000000000000ffed003850686f746f73686f7020332e30003842494d04040000000000003842494d0425000000000010d41d8cd98f00b204e9800998ecf8427effc0001108019301a803012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffdb0043000404040404040604040609060606090c090909090c0f0c0c0c0c0c0f120f0f0f0f0f0f121212121212121215151515151519191919191c1c1c1c1c1c1c1c1c1cffdb0043010405050707070c07070c1d1410141d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1d1dffdd0004001bffda000c03010002110311003f00d2a29b457c39f643a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45007fffd0d0a2933466be1cfb0168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a29334668285a293346680168a4cd3777245048fa2a3345558a25f968f97d6a1cd19a917292d2fcbeb50939e82933cd01ca4d45368a0394751499a334085a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a2933466803fffd1bd452668cd7c49f602d1499a33400b452668cd002d1499a33400b452668cd002d1499a3342402d14da09ed4587ca3a8a6e7bd52bad42dad14c93c8aa00e848e73e83a9fc28483d4bf4d26b82bcf1cd9a6e4b54676038270067f53fa572775e30d5eeb28ac114f65edf43d7f5ad391b15e27b149750c5f7e4507d09158d73e26d2ed721a55623b0c1af129ee6e2e18bcced213cf26a127a71d2ad53239cf549bc796a0ed8e066faf1fe35425f1e4cd9f2adf1ef9af3ccd373ed56a989cced5fc6fa939f955540fc6a16f1aeb1838283f0ae433ed4b472225cd9d60f1a6b3fde4ffbe6a51e35d5c9c9dbf975ae2c53bbf4a391029b3b98bc6f7c83f791a37e9fe35a11f8f31feb6dcfe0d5e6d9a334f90398f5fb6f1c69d29c4aac9ef8ae922d5b4fb8ff0055329c8cf5c1af9f334bbb91d7e5fc2a5c0a533e8f5955fe65208a7e7a74af00b3d6750b223ecd330195e2ba8b2f1c5da362f115d4f52bc63e8a7fc6b1f67d86a67ac834572b61e2ad36fc280c6373d9b007e75d224a8e01521875e0d4f215126a29b9e29df35268a9051499a334085a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a00ffd2b94519a335f127d80514668cd0014519a33400514668cd0014519a3341414521eb546f350b6b088cd70e1545524497c9f7ac6d4f5ab3d350b4efce38518c9fa74ae0f58f194b2eeb7b01b57fe7a6483f8570b3cd2cedbe77676f73571890e6771a878dae26063b350884e031e0815c44f7135cb9927919dbdc939a8052d6ea04377018e68feb45155624414b4514005145140051451400514514005145140f70a28a281051451400bf375cd6c69baedf69cc1a262507f09271f95635152d26099eada6f8d6de67f2af54c67d4631fe3fa1aeda29e2b841244eaeae148c1af9d3ff0065e6b574dd62f74e955e37660bfc249c63e99a87034533dec337ad3c5719a3f8b2ceff006c73e2295bb67827eb8aeb94ae010463f3ae770b1aa64b4519a3348414519a33400514668cd0014519a33400514668cd0014519a33400514668cd0014519a33401ffd3b5452668cd7c49f602d1499a33400b452668cd002d1499a09c50025076a8f9b14c691157739c0ea73c579cf883c57806db4e2776705f81c7b753f8f06ad2b8b98dfd67c4b6ba6a98e322498f1b476f727fa75af29bfd52ef5073f68762a0e42e4e06ef419aa4f23c8c5dc9624e493eb4cadd23272e8276dbfdda5a28ad1a33b85145140051451405c28a28a02e14514a01278ea78e281ee20e7eee735eb9e1af85577ac59addde4de4238ca81d4eee84d737e1ed0c9cdcdda7fbaac3b7ad7ad5bf886fad2d3ec90900018523b63ffadc5076430d3923c5f58f09ea3a75f4b6b0c6d3a46701d71fc9bea2b026d3ef6dff00d744ca3f0c7e95ed724cf33b49264b1ea4fad4324514cbb655de1bd6a6e75ac05d6a7870a5af4fd4bc3b6d2427c8508dd411f9d79cdd5acd68e639d7691c67d7e9547154c3b815a8a4cd2d072051451405c28a28a02e14514501700594e4707d471ff7cd761a1f8a6e2cdbcbbb2648dbd7a8e7d7ae3dab8fa2a5a4f7294ac7d0b637f6d7f1096d64571fe7b1e6ad0af03d3757bad3240f131da792a7273ffd7af60d235bb4d523cc6c15c73b1bafd7e95838db6375337e8a697da7fa52e57d2b22b945a2933466810b452668cd002d1499a33400b452668cd002d1499a33400b452668cd007fffd4b1451f351f357c49f601451f351f35001451f351f3500151492471a1766da064927031b6891828f988c0e4d796f89bc466e59ad2cc9f2c6439ff000357040fcc5f11f89de766b3b2caa29219bd7b7e55c293fdefff005d37b7f9e7fdaa0574a818b619a28a2b4b11ca839a5cd2514085cd19a4a28b157173466928a2c17173466929546e6000396c0e3fbd4b42472472cac151492780057b8f853e1c5b9b11a96ad280eea19173caf7e7b671c11838fe5cae85a3476912dc4cbfbc619c1edf87635d7fda6731f95bdb60e71fd73fd291e8d0c2ca5a88e82390aa91b55881f81c530f53d3140e9f3669683dba71b47944c5496e53ce4320f941e7f3a651526cd1ddeb6348934a56b4daae7070300fe3fad7966a7a4c3a8c786c0900e1bbfae3e99ad81f771d45368b9cdec93dcf28bed06facdbe553221e854135466d3751863124d6d222919dc548e3d79af640541078f94a9faedaf558f54d0f57d39ad6f7681b76b2b6460e339078f43cd523cac561b97547c6f9e7b52e6b4f59b58ed3529a188111ab9db9cf463c73f4acbaab1e6edb8b9a334945160b8b9a334945160b8b9a334945160b866ad5a5dcb69324d092194f1eff005f6aab452fee8ef63daf44d7e0d554296db2000156c7271c915d282b5f3bdb5ccb6932dc4470c8723ffae2bd9f44d6a0d52dd46e065030c3a7a64fd335cf28d8d14fa1d1d14d1d3d3b7d69df356057f8428a3e6a3e6a061451f351f35001451f351f35001451f351f35001451f351f35007fffd59a8a6d15f1763ec07514da28b0b9875048c734ccf3dab9df116b034cb53b483338c2a938c03c13c73c0c91ea47d6925790dbb6ace7fc59e223166c6d981c821d87639e83f2e6bcd3fdeff3fc34f9646964691cf24927ea4e693a575a563173b8da28a2b4b9985145145c028a28a2e014515a5a569579abdcada58465e42338a2e499b456d6b5a16a3a14fe4ea311424641e08238e9f9d62d0c7cc03b376aebfc13a29d6b5b86271fbb4396e9c8f4ae42bacf0aeaeba55f79a58a6780d41aa573e86f10e8ba769d66258fe57c80327bfd3e80d709f2d58bdd5ae3510af349bc76f4fc055407349bd0fa0c2c2490eabd6da6df5e44d25bc45d5792463a7f3fcab3f38aebf4af10a5869ad6e231e67407d7ebf81e3e9508e9a8ecb438f3f2b6d39f97fddffc7a97e5a7c8ed24acedd58927eb5160e6aac34ee878dbfc34f8a09656db12b31ebc64d464e3a5747e1ad52cec2e09b951862086c74e0ff3a51dc1cec8e75e378c9590146eb834c67d8a589c0ea79ab9e2bf12e8f2df79b13a808bb78eedcf3faedaf2ed5fc466e50c16a3e5e85b9e9e94ec72bc42b6a656b73adc6a0d221e8a067afddc9feb58f46589f9bad15573c1a93bbf7428a28a2e6214515bda5787357d5e3796c2dcc8a9d4e40cfb0e99a101834558b9b69ace792dee14a4919daca7b11c1155e93d0028a28a7700ab763792d8dd24f0e720e48e4647a7e55528ed52ecd023def49d4a0d4ed12e223dbe603a8e48c7e60d6a66bc47c3dacc9a5dc80dcc4e70c7938f7c57b3c72c72a2c9191b48e08ef5c93474264d4ea60a5a43e61d45368a2c31d45368a2c03a8a6d145807514da2803fffd6928a6d15f167d80ea43484e05213c5009105c4e96f0c933e02a8635e23ab6a92ea775e6c980a3217e9ff00ebaecbc63abed4fece8792c0173e9cf4fd2bcd46efc2b782ee67363a8a6d15bd8c243a8a4cd19a9b0c5a2933466aac02d1499a334580535f407c1fd095124d6e40773031264707b923f102bc12d6ddef2e23b6887cd290a3ad7aee99af6b5f0ff5db7d0f5163269f32f00281f33b0e49eb91ce73eb9a1221b3d6be2078762d6f469191034f08cc6475e3a81ec6be437468dd8302187507d7debef445531edce437be73b857cf3f143c16b6646b1a7440479fde05f524f27dbfafd6adaf7449f43c47b51e9d69b4b9a8b1a266cd8eb779678457dc83b1c7f3ebfad7450f8bd7812c279ee0d7099a41cd49d54f11389ef1a15bdc788addee34d469123215b81d48cf4aeb2d7c17acce70f1841ea48fe99a6fc0424695a864f3e7823e8531fcc1af7d18f6ad542e6af3199e329f0ef513d6551f99ad28be1b92a3cdb939f602bd53df8a5ad391193c7ccf2f5f86f0ff001dd37e55c87c46f0ac5e1ff0bbea3652b7991b2ab1cf5dcdb7a7d48fcabdff00a5717f106cbedfe14be888cec42c3b7dccb7f4a9e448c9e36a48f85ddddc966249f7e7afbd33bd2b70c47a1c5266a1a21cdb168a4cd254d857ea3a8a4cd3a18a49e558a152ecc7000c9ceea2c23434cd3a7d4ef12d2dd59d9ce38ec3b93ec2becaf0e6890e85a643671a8de14076f56ef9e95c5fc3cf0541a1da2dfdd80d7520c83ce5377620f439eb5e9d3dcc56b0bdc5c3ac691824b310001ea7a0ab847b9939d8f96be28f8767d37589353eb15db97c818c13c91fad797d7b1f89b50d53c76f7ef67c699a706643b73e615c8c82b9e7049033d3f3af1ae9f871ff0002a4d1717a0ea2933466b3b142d1499a3345805af4bf076acd329b0988fdda92a49ec4e71ee7927e95e659e4d5ab6ba92d6749e2241539a968a52b1f428feed2d666997f1dfdb24c841240c8e091ec7f235a35c8d58def71d45368a631d45368a007514da2801d45368a00ffd7751499a335f167d70b552f6e16d6de598e0ec5271c649c138156c9ae03c6b7c12dc5a231dd21c9fa2e0ff3c552dec0ddb53ceef6ee5bdb86b893ac873f4f6fd2aa51457525ee983770a28a2a841451450014514500145149feed0077ff000eb48fed4f11c59076c20c84ff00bb8033dba91c1ea2bdd3e24f85d75fd15a6b7016e6d89746c72401cafe3c1fa81553e17685069fa225e15fdedc8c927b0c6401dc75e41ee3dabd36e231346d1bf2ae083f8f15a246327d8f34f85de293afe86b0ddbab5d418461dc81c063eec41fd6bd0355d3e2d4ec26b1979595769c0ff3e95f3bdde8f73f0dfc5716a96fe63e9b3bed7e41c16ea0af1c0ce47d3af15f4a47209155d7a1191d7907a1aa24f8abc49a15d683a8bdacea42e494620e08f507a646467d2b9fafae7c77e144f11e9c5e303ed3102633c0c9f43ed5f25cf0496b3c96f302ad1332b0f423823f3150d1ac48a8a43f5a95229242022927a74a86c2f147d01f022fcc7737b6078465127d48e07f335f4d57c87f097ced3bc468d3a944954a1273c9fbdfd2bebcebc8e95ac5fba60e770a29b456a48eac3f12a336857ca3ab40e3fefa422b73e6ae7bc4b790d9e8d70f3636ba95e73c96f97b7d6896c26ec7c0f38c4ce3fbacdffa15455ea6fa269cf23bf9432c49aa72f872c24e8193e86b8dd440b128f38a2bb87f0a4383e5cac07be3ff00ad59371e1abe8738c3f718feb4b9cd55783d8e746e2768ebd3d6be84f869e06fb3ecd67525f988fddc78e80f739f6ae5fe1d781a4d4e6fed3d4548b68db0148fbcc39c1cf6c1ff003cd7d32815542200001c01d82d74415cd1bbec4a768c63ff00d55e11f11bc5371a8de27847441ba49b2b2b0ed9c7195f6ce73dbf1af51f15ebabe1dd1a5d45d771518518fe26e99ef8e0e7ff00d55c2fc37f0e97493c51a96d92eb513e72e4740df3679e413939fcbd69b7d0cd9d8786fc371689e1c8f4b6c330422423b93dff00cf6af92b5cb4165aadd5aa0e239180fc091fd2bee361c11f857c7df10ed85b78a6e941fbe4367ebc9fd6a1aea527d0e228a28a8360a28a2800a28a2803bef056a05256b263c37233fecfa57a703cf15f3dda5c496b3c73464e55b3807a8f43ed5ef567702e6da39b8f9d412076f5fc01047e1594d44d93e85ca29a29735cc50b452668cd002d1499a33400b452668cd007ffd028a4cd19af8b3eb86c876296ec0649f65e6bc3fc41782f7559a58c93183800f4185038ff0078827f1af5dd6a736fa74ae080769c67d4f02bc24966624f52727ff42ad69abb22614514575729905145148028a28a0029334b498a002ba2f09e92dac6b96d66c0b465c6fc76553cfe9546c748bbbf6f9170a3a935ef9f0cbc31fd9ef25fc986c80aa48e99e723eb9fd292d4c5d447b05ac115ac090440044000007181ed539c679e94dee79fbdcd15d0b426c60789f448b5fd227b2907cccb9523d57d0b67073fa579e7c33f154ef2cbe19d5c95bbb43b54b1c93b4ed604f4241ff3d4d7b1fca7e535e2fe27f0d5f5af8db4fd7348858c6cf89f68ea5b2093ebd493ee051fde25b3da38c741fe7f86bcafc6be06b7d466fed3b68d43025a451fc59ea7eb9e7df9af5305b00b0a82e27b7b689a49980403393536d02fa1f37ad85a460010ae57d46707dea710c4bc88d46df418ae875c96cef2ff00769ca46ee3ea4e29e3c2fabb00e21382320e47f1573b4fa1e749cdbd0c1899a270ea4ab03c1071f8d7b8786bc6767776f1db5e388e6401727be30324f4c9392735e62be12d60ff00cb2c7e357a2f076abd7e542bcf5a5072411734cf794ba824f9924523d88ff1aaf77a9d8582efba9953df8fe5d6bc623f0c6bb1fddb8231e8c7fa55bff844352ba23ed975c77ea6b7e73a3da33add47e206950237d8c99a4f42081fad7986bde25bbd6d817f92218c273fc35d7c3e08b441fbc7663edc7f8d6a5af8634bb76cf965c8e3e6e68f79912537ee9e2f9e7de9777fb55ef2349d307ddb64fca83a469bff003ee9f9563eca443a0d9e0a1bd3a7d2add94097170913b2a2938249ed9edefe95ed52689a54b80d6ebc74c5711aff00858dbffa55802579253d3de97b36b527d938ea7a1585b5bd9daac16bb420009c0ea5b1cfd78abe3a74af10d375fbcd3a504b33a0ea8735ea3a5ebb69aaa0489b6c9824a9ff003eb5d3194794eaa7516ccf3bf15407c65e2287c3f6f21fb3da0f32e003dd88da0fa700e38f5f4af5ab3823b5823b68542c712ed5038c0038ae57c35e183a15dde5dcf38b89ae9f76ee7e51d71939cf24d761f2e77776a7d6e6f71f9af0cf8b5e1b79608f5ab519643b2403fba73cfaf5e2bdc6b2f5ab4fb769b716c40f9d48069b57291f0f0eb4957afb4fb8b191a39d1be525727d7354be5ac1ef6354fa09451450585145140057ab7832f0cd64f039e636e07fb279fe64d794d753e11ba6835458f3857041fd4ff302a66b4293f78f631454633fd29f9ae26ba1b0b452668cd30168a4cd19a005a2933466803fffd16d21a69a53ed5f168fb038bf1bdc3c7a7c71a1e247c1fa0e7f9815e535dd78e2e8bdcc5680f080b11fef63fa01f9d70b5d14d58c65a0b9a3349456c622e68cd2514142e68cd2528ebc75fce8001b891b73cfeb5d868da0970b3de01b5ba21f4ebcff00853743d18b117774bc750a6bb65e9c7f9159b99c15ebdb445bd334efb54e96b6e002c715eefa6d82e9d691dbae381824773eb5c8784346fb3c6d7d381ba500a75181dfaf73c577b9ade0bab31a4afef310f5a075a33eb480f35b9d771f41da065b185e6b2eff0059b3b0526795430fe1c8cfe59cd79e6b3e2c9aef31d88d88dc1cf5ac9c9221ca28eaf55f14d9d8298e1612c878c2e4e3dfd0fe75c1adc6ade219d91599909ce1470a3dff001c75349a6786b52d47f78c0a267ef377cf71eb5e9fa568d6da5c78887ce4005bd6a13e639b99c9e866e8fe16b5b25df718964e08f635d60da076ff00eb503da9b5a248e98538a1d45369df35558be541451f351f350160a28f9a8f9a800a28f9a8f9a8010d232aba946e41183fe14ef9a8a00e235af08c7767cdb2db1b7753920d79e98b51d2271215685c8e0e0f4ff0e2bddcd55bab2b5bb50b711ab81fceb2947a984e9df54717a4f8ce394882fc0420603e73f9d7710dcc1731896175753c823915c1eabe0c576f334e3b78c95623afa66b9e8d35ed0ce555c479e4ed247e78a1392214a7196a7b19cf041a56e463b77fa570169e38830a977195c0c122babb3d66c2f9008a65dc7f87233f2faaf5fd2b453375511e2fe31d36ddf509adc636e0119f5ea7f9d7885e5a4f672f953678ce0fa8afa73c6d6312cc978bf79fe53ee40eb8af26d634d4beb76c0fdeaf2a6b99bf78c955b4cf33cd19a5743139460783dfafa67e869b4d6a7a31926ae2e68cd2514c62e6add94e6deee39738dadfa743fa66a9d27f3a18267d0b6d289614941e1d41fceac565e9322c9a75bb2f4d800ff80f1fd2b4ab9267421d45368a801d45368a007514da2803ffd28693e6a5a43d6be3227d7dec78cf8a27f3b5697fd9da3f9573d5afe213ff00138b8fad6457540e59b0a28a2b508851451407307e95d5681a4fda1bed5700ed1c807d4573f636ad7570b160919e71e99af55b78120856140405158cdd8e5af539558940503e5038e076c56c687a7ff6a5f243ceceadec011c7e3cd64f635d5787b5ab6d2a190c885a43d31c7f4a85bfbc792b57ef1ebd0c690c4b12f0aa063e8b51cb7b6b00ccd2aaf1ce7dabcbaf3c65a8ca765bed45f5effe7f0ac28e1d4f5694b2ee9189c93c9fceba79bdd3b39edb1ea171e2ed1edd8aee676ff6573fe15c6ea7e2fbbb9631d97c919e3df1fd2a7b1f04ccc37dec9e586ec2bafb1f0e69762731ab3371f7f07fc29ae660dce4798dae93aaea73062ac73d59bd2bd034ef08d95b6d92e33238c77e3a57588a14001401fd29fdaabd9f72d53ee0a11000a000bd00a7669b9a3354958d92487668cd3734669943b34669b9a334123b34669b9a33400ecd19a6e68cd003b34669b9a33400ecd19a6e68cd050ecd19a6e68cd08053fad35904830ea0a9eb4b9a33435126c99cd5ef8534dbadccaa51cf3c7f9c9fcc57157de14d4acb74f6ec1d17d300fe03a9fd6bd6b8a0e0e411f5a8e48993a6ba1e07757d7770ab15d313e5f63efebf95513efd2bd7b5af0bdadf2b4d00d9291d88c1c7b7afbe6bcaef2cae2c6530dc2ed27fce45734e12470d48c93b9e7be23d399585cc6bf2e087c7a9ef5c87f9fc2bd7ae2249a2789feeb8c5796df59496970636520678f7144247761eafd9653a28a2b43bd30a28a2a8723d77c1d7026d2c47b8fee98afd33f37f5aeaf35c1781d98db4c9e8c4fe781fd2bbd15c9511ba61cd2e6928ac8a173466928a005cd19a4a2803ffd38334d34b4d6ea6be3227d75cf11d7ffe42b3ff00bdfd2b1f9ad8d7ff00e42d73fef563d75c76309fc41cd028a2a884875196f5a6d4d6d08b89d2219f9ce3e9ef5436edef1db786ec1a28cdd49fc7c007f98aeabb77c75a82da14b7816153c20c54bf4ae772b9e0d79f331eaa58800649e001deba9d37c2da85db033030a1030586339f4ad8f07e8eb2a3decea082d8507b6393fcc57a37ca3006315a469df52e9d3e6396b2f0869d6d8694194f3f7bfc2ba782da0b6411c281147603802a414574a844ec5048765727d681d69b4559a0ea29b45003a8a6d14143a8a6d14123a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29a28a007514da28287514da282478fef5737e22d223bfb676551e6a8c83ed5d0d35b054e73c8a86ba09abc4f9ed9361287f8722b0b58d3e3bcb7638fde28ca9aeefc4ba72d85f9dbf724cb01f967f526b9ddbd7d1ab89ab33cfbca323c69832b142082b91ffb2d276adcf10db2c1a8314e15c03fa027f5cd618ad56a7ab4e7cd10e68f5a28ed4cde47a3f8133b26f4c8fe95e859af3ef02a029337b81fcabd02b9a7f11ac242e68cd25158ea697173466928ab0b8b9a3349450173ffd4ad9a43d0d21a8cb75af8f3eb528b3c63c428cbabcf907e639ac5aeb7c61098f51f379db2018fa8e3fc2b9215d51d8c1851cd14669c85cc15b7a0279ba8a161c20cd6193c7cc7f5adfd06f2dad9da6b891548e9f4a4c8a8fdd3d23b7eb4f453232a2024920015c949e2cd2e31c3127f0aeb7c15e26d06e7520b70e55863606c633dff003358a8499e27249b3dd74bb53656514200caaf38f56eb5a3dfe94d42a5411d0a823e9da96bb92b23d182b217f0a5cd368aa287668cd368a007668cd368a00766933fdee9494a7a76a02e70be39f19c3e13b1598a092694e11338e704827db2307eb5e1969f1af5e86e77dc468f1673b7041033d3d3f4adbf8e1a6de19ad351193063cb23fdae4f4f703f4af0054672319f4a965247dd1e13f14da78ab4ff00b65b02aea76ba0e707d33f99aeabb578efc1dd0eeb49d0e696e54a9ba937a8f60a00247be322bd87b550585cd372b45796fc4ff106b7a269f17f6328cca4abb6ddd807d0f407d3f1a0947a734f0af0eea3ea69ab7304870aea4fb106be19d4358f11fcb25ecf3289065771207048e3db8c715d57846cbc6d7f7d6d7164f2f92cc0976271b41e41f51c74fc282ac7d899ff00ebd347a54316f1122b9f982a83ee70327f3a9a816c676b3aac5a3e9d36a1719db0a162011938e703d49c702be6dbef8d7acb5d39b381121c90a1b93e809231fcabdb3e2169971aaf866ea1b6cef552f81df1ce39f5c57c532413c52b47246c1d09183db152d8d2b9f5b7c3ef888fe2a9a4b2ba8424e80b0607a8c74ff80fe39fe7eb39af99fe0b68b7ab7b2eaf2a958305013c0c8e48fd457d2ffe4d081e82e68cd368aa247668cd368a02e3b3487be7a5251401c578cac3cdb55bb41cc5c7fdf5ff00ebaf2cef5ef1aa431cd612c521014a9e7e9ce7f0c57ca1acf8a8dacf2da592ef92362a58f23e5e08c0c743df35cf381c7569df52ef896cfcd87ed0382b818ff3f5af3f32a0ea455a9dfc41abab4b22b6cc0240040c7f5e9587f63933b491f2fafad4a3ab0fa1a3f688b3b7239a901dc38e7756725973f3b55e48d6350173f2fbd53475f31eafe0a8ca58c921ff00968e7f2031fcf35da66b07c3b00b6d2a151d4824ff00c08e47e98addef5c933a202e68cd2515058b9a334945002e68cd251401ffd5a745141e95f1e7d61e7de388544304c07cdb8afe1ffebaf3b1c614fbd7b1f89ed16e74b937754f9d7ea3ff00ad9af1ac7fe3b5b53d4ca63e8ed487ad19ade44152781e5214371fceb5349f0d35fa3bb481402074cfa1f6ec6aa96fef575fa16a165676ae6795558b138ebda9366355d908be09b4e8d2b1fd2bd0bc3bf0a34bb9863be69a4186c8071c85ec6b968fc47a548e23594e4903f33815f45e83188f49b75ff6727df764ff005a21b9c34dbe6d4da8e31146b10c90a001fcbfa53a8cf1499ae83a98b452668cd002d1499a33400b452668cd002d1499a3340156fac6db50b76b4ba8c3a38c10467af71f435c169ff0b7c3163762e56232104300d8c03f957a477a6d49498e5455408b8c01ff00a0d14828cd509ea2d54bcbab6b38ccb74ca8aa392ddb156f3ec6b9ff0011787ed3c47a7bd8dd33283c865ea0e4738f4ff3ef40933c87e285e785b5ab185d2f14cf1b00bb083f293ce71ec0e3df15bfe1df1f782b4ab1b5d26dee58ec0541da3ab1c9ce0f1c926b36dfe09691190d717b24833c8c01c7d79ae8ec7e14f85aca512f96d29072371e98fcaa4ab9e970c8b2c6b2a1055c023e8dcd3ea289121511a8c2a8c01ec3815266a9122d634fe1fd22e6737135a46d2e73b8a827f3db9ad8cd2f7a010c8e3489447100aa38007a54829bc668cd003e9b499a33400b452668cd002d3a999a3340195ade9abab69d369eeed1acc02965ea0023fc2bc1eefc2d63e1dbb68a20187243b75c7e1cf19afa2670ef1b88c9048207b123afe15f2ef8b7c33e2c17dfe9b75bd2424a7cc780a78e3a0e2a268892f74d49ee2dc44e8f22f423a8f4fa8af269de3133807237103f3adc1e11bb2bba6b9230327bf18cfb5724d6211ca973dc0f7ac113416a5e520f423f3a954333aa0eae7159cb68c395735d1f87ad8dd6a70c6dc8049ffbe467fa5391dd13d92c57cbb3850e321141abb9a8d17006dedc53eb8e474af845cd19a4a2905c5cd19a4a282ae2e68cd251405cffd6a59a3349457c69f5857ba896e2de484f47522bc3af6d9ad6e6485c11b0e07d2bde1ba1fcb9af2df1869cf05e0bd5fbb375faa802b483d496ae71f9a8243260aa81cd4d45761899861ba73f31fbdef5d2699e136be816e249f6863c0fd3fa5669af4cd0ad6e20d3d1a542bbb95c9ea3e9f5a99791cf5dd91068be11b082ea3dd991b23a8afa8ada348a0489470a302bc274dc9bf83fdf5fe62bde233f20a748e3a126c928a4cd19adcea168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a3b7bd2668cd002e28a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a0d2668cd002d79a78e7067b73e8a7f98af4a27f3af29f19dc896fd101e23040c7fb5827f90a8a9f09954764713306789d07718af26b888c33346c7a1feb5eb7236d4766e8aa4fe0067fa5793deca26b99241d0b1f6e335c90dcc70bb95f8eb5dd782ecc3c8f76d8fdd9da3dbd7f435c26371c0eb9c57b4683602c6c224230cea18fd5b91fa6055cd9eb2f88dd1d68cd2515cb7b1b8b9a33494520173466928a005cd19a4a2803fffd7a19a3349457c79f5829e41ac2d7f4ffb7e9f222fdf452e39ebb79c7e95b94d2011838e430fc1a9adee0dfba7cfc4329c1072a704500f15d2789b4efb15eb3c6a44721c827d4f5fd6b9bff67f4ae85a983d0d1d2ec24d52fe1b3841cc8c067b01dc9f615f40f89ac458c1650a8188e3db8ff771597f0c7c24b043fdb17f11f30b62104900061d48f5ce7db1822bbff15d8fdaac9a651f3443767d8727fc6b4b687255d56879869e717b037f75d4feb5ef119fdd8f71fe15f3f248c8e1d3ef29c8af70d2af05e584530237328ce31c1e87f90a54b738a83b3b1aa0f028cd27a515d0768b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd2507a7bd0043737096d03cf21f95064ffc06bc2afee4ddddcd3e78666201ec33903f00457a1f8bf5430c02ca32374832d8c63039c1f7af2ffa573d47d0e3af3be85db1b2fb7dcadb01c3f07d87ad79678874a6d23539ad0e0056e3af46c91fa115f43f832c59ddaf1c60018523d7a1fc2b80f8b5a4bc57f0ea68a489808ce7d474fd07e95108f536c2aea79ef8734e17d7c0480ec4e4fe15ec08022e076e31e9b6b97f0be9ad61685e51979486fc2baaf7151391ea45750cf34b9a4a2b291a0b9a33494520173466928a005cd19a4a2803ffd0cecd19a4a2be3cfac17347e3cd2514b940c7d6ec46a364f07f100587d474fceb8ef067865b5ad6561b853e4c44973d31b7b7e647e15e8876d765e10b6b4896796340b23b7381d460735bd36673476714290c491a0e14003f0e29668d268de371f2b8c1fa74a767d696bbac71bfe53c3355b33637d2444103208e7a83ff00d7c8adef0aeae2ca768276c4721c0fafff005f8ae93c59a51bb816e2151bd393f4af2d04a36e190467f0db5c8d5a479d3bc667d061f2372e30dcd3ab86f0cebcb7318b4b96f9d78527bfb57707ad752773b213bea04d28a402929d8b1d452668cd002d1499a33400b452668cd002d1499a33400b452668cd002d1499a33400b452668cd002d1499a33400b452668cd002d1499a33400b452668cd002d1499a3f1a005354efaf62b1b67b8958003f5ddc018fa9029f75711dac26595800a33d7afb57906b5adcba949f292b18380b93cd44a7632a928a89997b7525e5d3dc48c72c73f8741f90a659c0d773ac09c9638cff008d42a19d822e4b12303debd5bc35a20b3805c5ca8f31c020119c7f81ae64a4d9c367391bfa6d9a69f669689c05193df93927f526b9bf1a5bdbddd9c705c0e43865f6dbdff226bb11b707a579ff0089ae965ba585704475bbd158f4e953b1cc20c2ed5e802e3fe03f2d499a653ab85ea7a4b6b0b9a334945226e2e68cd2514142e68cd251400b9a334945007fffd1cda29b457c79f543a9b451400d22b4b4dbf6b09848a383c107d2b3e9878cd3bd81aba3d7ed6e63ba8d5e36049e481ce3d8d58af29b1d4a7b17cc6c76b1048c678cf35e8b61a8c57d16e8c8cf71ef5dd191cb38b45f2aae0ab0c86e0fe58fe55e59e24d05ecdcdcc009898f41dbff00ad5eaa0d453c51cf1986550c8c3041f46e0d68e1739250b9e0914b241289226c30208233db9af53f0ff8856f8791724090700fad719afe89269d2f9b102616e7239c7b1ae7e19a582459a23b4a9522b993e591c69ca0ec7d05be9335cde85ad45a8db80ec048a067240c93d4815d1e7dbdfe95d29dcee4efb0b9a334dcd19a762c7668cd3734668b00ecd19a6e68cd1601d9a334dcd19a2c03b34669b9a3345807668cd3734668b00ecd19a6e68cd1601d9a334dcd19a2c03b34669b9a3345807668cd3734668b00ecd19a6e682dc12d8c50c0766a19a64823334ad8550c726b9ed63c45069ea52221e439c01db8af3bbff116a1a8466291c08c9ced007f3ebf874a8728a3275122debbaecfa94ad1a1c440f0077dbeb5cda2b390101273814e8e392560a8a589e302bd2742f0d25b8173780798390a4f4fa8f515cdac99c6d4a7219e1df0e88c0babc5e472abfd715df7cbdaa1ff00771c7a557bdbc8ece1691c8c8ff38ae951b23b214ec50d635416311098f30f03f1af369247958bc84966e493ce6ad5e5e4b7b31964ee71f4ff0022aa573549f43d18ab6e20e94ecd2515ce6d71734b4da28247514da2801d45368a007514da2803ffd2cba29b457c79f543a8a6d1400ea46149450000607cd572caf24b2b812a13b78c8f6aa747afe55a260f53d56cefa1bd8d5e33ce3257deaff1c579569b78f6570b28276e70457a65b5cc37312cd130c30cd76539dd7bc72ce16d875cdbc5750b452a82bd3d7fc9af23d6f449b4c978f9a339c119fd6bd801aad79690dec0d0cc010c0fe1ee3de9ca17392a42e8f0db7b892d6412c4c430e95e95a378aa3b92b05d655cf01ba73fcab0751f095cc1b9ed4874e703be2b906124129041464fa8c7ff005eb9eee272ae781efe1948183c1fc68af2ad2fc537366162b81e620c0ff3eb5e83a76b167a8a1788804762467f2ade133a6152e6b514df97ef7ffaa8ad37374fb0ea29b455087514da2801d45368a007514da2801d45368a007514da2801d453683fad003a9a4a8cf3d2a09eea2b742f33aa8192738e95e77ab78b5e6060b00554756ff0a86ec4392475dab7882d74d51b71239e001cfe7e95c25f78aefae95910840c7a0f4f407923f3ae5a491e462ecc5cf27934e8e2926936440b3678c7ad60e6dfba71cab37eea066763bdc925b2735a3a669571a94c2389480792c7a62ba5d33c21249b5ef5b6a919da393f8f6aefedace0b38fcb894003e9f99349536c15393f79995a56836ba700f80f27f7bd2ba0ff00eca83b7f2fd2b26ff57b6b01866cbf602b74a313b610b1a334ab0216918051cfff0058579b6ada91bf9b8e5074ff003eb46a3ab4f7ec14fca83a01fd6b22b9e752276c2361c38a75368ae67a9a8ea29b45201d45368a007514da2801d45368a007514da2803fffd3c9a29b457c79f543a8a6d1400ea29b45003a83d29b450021e957ecf529ac9f72648ee39aa349f2d5a985ae77f67e24b69768b8c46c4e30738cfd7a7e75d12bab8c8230dd0839af1e3ce338adcd235792c58accccf1b74c9ce0d74c2af439a54fb1e8a7a6d38ae6359f0f417c0cb06124c76c609f7ae82dee21b98c4b090435581b6b77691cf285f46787dee977b62c44f1903d40e3f3aa692cb11cc6cca7af048fe55ef12c50cc0a4aa1c37a8ae6351f0bd95d0cc3fba6f6e9f9567ecec723a56d8e4ac7c537d6b84931201d77649c577363e22b1bb519708e71c1ae0efbc317f67ca81220ee31fe39fd2b9b224462a41439f71f76b34e484a4e27bfab2b0dc8411d7834ff00c4d783c1a8dedb9063958639c67fa74aea6d3c65731285b88c3fbf4ff1ad15446aabc4f4da2b8d87c6760e079aac9f8569c5e24d2a6c626c1f706ad389aaa899bf45548af2de6e636561ea0ff4ab02543f2823deb44d32af163e8a6e7db8a8e4b886252f2b05039e4d17484da26a5cd605cf8934ab7e0cc0fd05625c78d6043fba88b0f5cf5fc2b3e7427289ddd373fc59fd6bcaaefc5f7b38db1288c74c75fd6b064d5b529092d70ff9d275110eaa3d8aef55b1b2c9b89003e9d7f957257de330a76d947bbddb8e2bcf5e5925399199bea4d30ff779ac9d4ec73baf7d8bf79a8dd5f3ee9a4247403242f19e83f1aa6aacc768049fcf9ab9a7e9d71a8ca23894fb9ed5eaba5e836da7a0dea247fef1c71f4ef52a0d909391c569de16bbba2b25c66343ce7bd77ba7e8f69a7ae2350ccbfc4d8cfe75aa38f9453ab5853b1d2a925b898a5047e54d278ddfad73baaeb30c08d0447739e38c8c66b5735189d10806b9abadba9b684fef0f53e83eb5c2348f2b1790e49f5e698ecf2312c4927a9a2b86a54933b210b0b8a31494562683a8a6d1400ea29b45003a8a6d1400ea29b45003a8a6d1400ea29b45007fffd4c7a29b457c79f503a8a6d1400ea29b45003a8a6d1400ea29b45003bad308e6968a0ab9a163a84f64c0c6c76f75eb5dad96b969720072118f63fd2bcea90161c8eabd2b68d4688942e7b089148ca118eddf34e0735e5f6dac5edae15242557f84d75763e20827c2cf88db9e491b47e2715d6aa2673381d2fae4718c5655ce91a7dd03e642b96ef5792e6de5fb922bfd0d4b56da664e17dce12efc1b1b12d6b305f66e7fc2b94b9d0b51b6277465c2f7504e47ad7b38f7e948caa720e306a3d92664e923c0dd1e33870476e9d2999e057b74da4e9f3ffae8549f6e3f95654de15d2a4276c663fa1ac5d368c3d933cb22ba9edce629197f1a986a37aa72276cf5eb5e87ff0008858146c3364f43c55193c1639f2e5fa7b53e4685c93472bfdb7aa6dc09db1d3a0aa736a1793e1669598575a9e0abaddf34ca17d456bc3e11b15c194b3f1cfa53b31284d9e6279cee268557276a027e9cff00e835ebc9e19d1d47fa907ea4d5f8748d3adce6185411f534b9587b2679047a65fcff00eae0623fddadbb4f09ea3707f785631ef9ff00ebd7a908d063007a74029f56a9a35587ee79f8f053839370b8fa735b76be16d3a10a194c8dce49e9f957499acdbad5ac2d73e6ce808cfcbb867fef9ebfa552844d1508966dacedacd4fd9a354f5c55c07a7ad7223c596923e1227d83b9c0fd3ad472f89d369f2e23ed9ed426968742a6760ec10167200f7ac8bbd72cad4121bccc7185c570f75aaddddb7cf210be8318ff001fd6b349ee6a1d4b1a2a7dce8aff00c4135d02b0e635fd71580c4b924939f7ef499a4ae69cdc8e8504829d4da2b201d45368a007514da2801d45368a007514da2801d45368a007514da2801d45368a00ffd5c4cd19a4a2be3cfa8173466928a005cd19a4a280173466928a005cd19a4a280173466928a005cd19a4a28014f6a4a28aa404892cd191b58afe35a11eb57d1e0890903d6b2e8ef56a7606a27636de285c62e53f115a49e22b06e32c3f03c579de297a56aaab443a68f481af69e587ef0649c56b472a4c9be36047b1af21abd6ba9de5a65607383d8d6aaa90e99ea94023dabce4788751f55c507c43a8139dcbf950ea13ec647a2679f6a52ebed5e73fdbfa87f797f234d3e20d408c338a3db20f6723d15e68e3e59c0aa326af611120caa48f422bce26bdb99ce65727f1aac7777cd2f6e8af627a43ebd609d5ff00206b0efbc4cd82964833fde6fe83fc6b91a075ac9d6ec35491aafacea328d8f29e78e38aca64dcc5d9b24f7ebfad3a8a8736cd541082978fff005d1454dcad8434ecd25152c05cd19a4a2a4942e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945002e68cd251400b9a334945007ffd6c1e68e68a2be44fa80e68e68a2800e68e68a2800e68e68a2800e68e68a2800e68e68a2800e68e68a2800e68e68a2800e68e68a2800e68e68a2800a28a28b87bc1451451701314a68a2828074a39a28a01ea1cd1cd145048734734514007347345140073473451407bc1cd1cd145001cd1cd145001cd1cd145001cd1cd145001cd1cd145001cd1cd145001cd1cd145001cd1cd145001cd1cd145007ffd7c1a2933466be44fa8168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a293346680168a4cd19a005a2933466803fffd0e7e8a28af913ea028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00fffd9, '', '9xsnqDN', 1),
(12, 'penis', 'dddewr', 'teste@teste.com', 'neptvnd', '1234', 0, '', '0', 'AddedByAdmin', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;