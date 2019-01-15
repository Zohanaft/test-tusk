<div class="bg-img">
  <div class="post-comment-wrapper wrapper d-flex row-d-flex flex-wrap">
    <div class="d-flex xs-12 sm-6 justify-content-center">
      <form class="post-comment-form d-flex flex-d-column" method="post">
        <div class="info d-flex">
          <div>
            <input class="textinput" id="firstname" type="text" name="firstname" maxlength="30" placeholder="Имя" autocomplete="off" required autofocus><span class="help"></span>
            <input class="textinput" id="surname" type="text" name="surname" maxlength="30" placeholder="Фамилия" autocomplete="off" required><span class="help"></span>
            <input class="textinput" id="lastname" type="text" name="lastname" maxlength="30" placeholder="Отчество" autocomplete="off" required><span class="help"></span>
            <input class="textinput" id="email" type="email" name="mail-post" maxlength="50" placeholder="E-mail" autocomplete="off" required><span class="help"></span>
          </div>
        </div>
        <div class="coment d-flex justify-content-center">
          <div>
            <textarea class="textinput" id="coment" name="coment" placeholder="Ввведите коментарий" maxlength="1200" required></textarea>
          </div>
        </div>
        <input class="post-comment-button" type="submit" value="Отправить">
      </form>
    </div>
 
    <div class="d-flex xs-12 sm-6 justify-content-center">
      <div class="comment-list">
        <ul class="d-flex flex-d-column">
          <?php
          foreach ($vars as $key => $val ) {
          ?>
 
          <li class="item-comment">
            <div class="item-comment-wrapper d-flex">
                <div class="item-comment-usericon">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 299.997 299.997" style="enable-background:new 0 0 299.997 299.997;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150
                                C299.996,67.156,232.835,0,149.996,0z M150.453,220.763v-0.002h-0.916H85.465c0-46.856,41.152-46.845,50.284-59.097l1.045-5.587
                                c-12.83-6.502-21.887-22.178-21.887-40.512c0-24.154,15.712-43.738,35.089-43.738c19.377,0,35.089,19.584,35.089,43.738
                                c0,18.178-8.896,33.756-21.555,40.361l1.19,6.349c10.019,11.658,49.802,12.418,49.802,58.488H150.453z"/>
                        </g>
                    </g>
                  </svg>
                </div>
                <div class="item-comment-info">
                  <span class="item-comment-info-name"><?php echo $val["firstname"]; ?></span>
                  <span class="item-comment-info-surnme"><?php echo $val["surname"]; ?></span>
                  <p class="item-comment-info-comment"><?php echo $val["com_text"];?></p>
                  <span class="item-comment-info-date"><?php echo $val["dt"]; ?></span>
                </div>
            </div>
          </li>
 
          <?php 
          }
          ?>
        </ul>
      </div>
    </div>
</div>
