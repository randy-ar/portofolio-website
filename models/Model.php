<?php
class Model{
  public function connect(){
    return mysqli_connect("localhost", "root", "", "portofolio-website");
  }
}