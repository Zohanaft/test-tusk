<div class="wrapper">
        <div class="com-form-wrapper col-md-6">
            <div class="com-form">
                <form id="send-comment" method="post">
                <div>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="firstname" 
                                type="text" 
                                name="firstname" 
                                maxlength="30" 
                                placeholder="Имя" 
                                autocomplete="off" 
                                required autofocus>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="surname" 
                                type="text" 
                                name="surname" 
                                maxlength="30" 
                                placeholder="Фамилия" 
                                autocomplete="off" 
                                required>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="lastname" 
                                type="text" 
                                name="lastname" 
                                maxlength="30" 
                                placeholder="Отчество" 
                                autocomplete="off" 
                                required>
                        </span>
                        <span class="help">
                        <input  class="com-form-textinput" 
                                id="mail" 
                                type="email"
                                pattern="([^.]+[A-Za-z0-9._%+-])*[^.]@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$"
                                name="mail" 
                                maxlength="30" 
                                placeholder="E-mail" 
                                autocomplete="off" 
                                required>
                        </span>
                
                    </div>
                    <textarea   class="com-form-commentinput" 
                                id="coment" 
                                name="coment" 
                                placeholder="Отправить вброс" 
                                maxlength="200" 
                                required></textarea>
                    
                    <input  id="send_comment"
                            class="com-form-submit" 
                            type="button"
                            value="Отправить">

                </form>
                    
            </div>
        </div>

       
        <div class="col-md-6">
            <div class="com-list">
                <ul id="com-list">

                </ul>
            </div>
        </div>
    </div>

