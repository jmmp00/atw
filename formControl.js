                            let name = document.querySelector('#name');
                            let nameError = document.querySelector('#nameError');
                            let surname = document.querySelector('#surname');
                            let surnameError = document.querySelector('#surnameError');
                            let username = document.querySelector('#username');
                            let usernameError = document.querySelector('#usernameError');
                            let email = document.querySelector('#email');
                            let emailError = document.querySelector('#emailError');
                            let pass1 = document.querySelector('#pass');
                            let pass2 = document.querySelector('#re_pass');
                            let passError = document.querySelector('#passError');
                            let button = document.querySelector('#signup');

                            function checkPassword () {
                                if (pass2.value ==""){
                                    passError.innerText = "";
                                }else{
                                    passError.innerText = pass1.value == pass2.value ? 'Passwords match' : 'Passwords do not match';
                                    passError.value = pass1.value == pass2.value ? '1' : '0';
                                    passError.style.color = pass1.value == pass2.value ? 'green' : 'red';
                                    button.disabled = pass1.value == pass2.value ? false : true;
                                    button.style.cursor = pass1.value == pass2.value ? 'pointer' : 'not-allowed';
                                }                
                            }

                            function checkNameInput(){
                                if(name.value == "" || name.value == " " ){
                                    nameError.innerText = "This field is required";
                                    nameError.style.color = 'red';
                                    button.disabled = true;
                                    button.style.cursor = 'not-allowed';
                                }else{
                                    nameError.innerText = "";
                                    button.disabled = false;
                                    button.style.cursor = 'pointer';
                                }
                            }
                            
                            function checkSurnameInput(){
                                if(surname.value == "" || surname.value == " " ){
                                    surnameError.innerText = "This field is required";
                                    surnameError.style.color = 'red';
                                    button.disabled = true;
                                    button.style.cursor = 'not-allowed';
                                }else{
                                    surnameError.innerText = "";
                                    button.disabled = false;
                                    button.style.cursor = 'pointer';
                                }
                            }

                            function checkUsernameInput(){
                                if(username.value == "" || username.value == " " ){
                                    usernameError.innerText = "This field is required";
                                    usernameError.style.color = 'red';
                                    button.disabled = true;
                                    button.style.cursor = 'not-allowed';
                                }else{
                                    usernameError.innerText = "";
                                    button.disabled = false;
                                    button.style.cursor = 'pointer';
                                }
                            }

                            function checkEmailInput(){
                                if(email.value == "" || email.value == " " ){
                                    emailError.innerText = "This field is required";
                                    emailError.style.color = 'red';
                                    button.disabled = true;
                                    button.style.cursor = 'not-allowed';
                                }else{
                                    emailError.innerText = "";
                                    button.disabled = false;
                                    button.style.cursor = 'pointer';
                                }
                            }
    
                            pass1.addEventListener('keyup', () => {
                            if (pass2.value.length != 0) checkPassword();
                            })
                            pass2.addEventListener('keyup', checkPassword); 
                            name.addEventListener('keyup', () => {
                            if (name === document.activeElement) checkNameInput();
                            })
                            surname.addEventListener('keyup', () => {
                            if (surname === document.activeElement) checkSurnameInput();
                            })
                            username.addEventListener('keyup', () => {
                            if (username === document.activeElement) checkUsernameInput();
                            })
                            email.addEventListener('keyup', () => {
                            if (email === document.activeElement) checkEmailInput();
                            })