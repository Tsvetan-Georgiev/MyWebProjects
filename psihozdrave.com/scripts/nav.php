	<header>
      <div class="global">
            <div class="container">
               <div class="left mainLogo">
                  <a href="adminpanel.php" title="Психо здраве">
                     <span>Психо здраве</span>
                  </a>
               </div>
               <div class="right contact">
                  <a href="../contact.php">
                     <p class="contact">Свържи се с Иван</p><br>
                     <ul class="icons">
                        <li class="email">
                           <span>itrichkov@abv.bg</span>
                        </li>
                        <li class="chat">
                           <span>Chat</span>
                        </li>
                        <li class="tel">
                           <span></span>
                        </li>
                     </ul>
                  </a>
               </div>
               <div class="right searchBox">
                  <script type="text/javascript">

                  </script>
                  <div id="___gcse_0">
                  </div>
               </div>
            </div>
         </div>
         <nav class="menu">
            <div class="container">
               <ul>
   <?php 
      if (loggedin()) {
   ?>
            <!-- logged in !-->
                  <li class="switchListItem">
                     <a href="#" title="Редактиране">
                        <span>Редактиране на статия</span>
                     </a>
                  </li>
                  <li class="everythingListItem">
                     <a href="../storyies.php" title="Статии и публикации">
                        <span>Статии и публикации</span>
                     </a>
                  </li>
                  <li class="memberListItem">
                     <a href="../scripts/endsession.php" title="Излизане от системата">
                        <span>Излизане от системата</span>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
             <div id="content">
               <?php
                  include_once('../_class/simpleCMS.php');
                  $obj = new simpleCMS();
                  $obj->host = 'localhost';
		  $obj->username = 'username';
		  $obj->password = 'pass';
		  $obj->table = 'table';
                  $obj->connect();
                  $obj->write($_POST);
                  echo 
                     "<article>
                        <p class='admin_link'>
                        <a href=\"{$_SERVER['PHP_SELF']}?admin=1\">
                           <button>Нова статия</button></a>
                        </p>
                     </article>";
                  echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();
               ?>
            </div> 
            <!-- logged in !-->
   <?php
      }
      else {
   ?>
            <!-- logged out !-->
               <li class="quoteListItem">
                     <a href="loginpage.php" title="Добре дошли!">
                        <span>Вход</span>
                     </a>
                  </li>
                  <li class="everythingListItem">
                     <a href="../storyies.php" title="Статии и публикации">
                        <span>Статии и публикации</span>
                     </a>
                  </li>
                  <li class="memberListItem">
                     <a href="../index.php" title="Контакти">
                        <span>Към сайта</span>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
            <!-- logged out !-->
   <?php 
      }
   ?>