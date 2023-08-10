<?php
class Model{
  public function connect(){
    return mysqli_connect("localhost", "user", "password", "portofolio-website");
  }
}