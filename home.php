<?php
session_start();
$_SESSION['isConnected']=false;
require_once __DIR__ .'/../layout/header.php';
require_once __DIR__ .'/../layout/navbar.php';
?>

//TODO:编辑profile页面

<div class="container d-flex justify-content-center align-items-center">
             
             <div class="card">

              <div class="upper">

                <img src="assets/images/profileBackground.webp" class="img-fluid">
                
              </div>

              <div class="user text-center">

                <div class="profile">

                  <img src="https://i.imgur.com/JgYD2nQ.jpg" class="rounded-circle" width="80">
                  
                </div>

              </div>


              <div class="mt-5 text-center">

                <h4 class="mb-0">Benjamin Tims</h4>

                <button class="btn btn-primary btn-sm follow">Edit profile</button>

                <button class="btn btn-primary btn-sm follow">Logout</button>
                  
                </div>
                
              </div>
               
             </div>

           </div>

