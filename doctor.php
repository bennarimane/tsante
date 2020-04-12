<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="include/layout/css/search_box.css">
    
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>santé | Medecin</title>

    <!-- Favicon  -->
  <link rel="icon" href="include/layout/img/core-img/plus.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="include/layout/css/core-style.css"media="all">


    <!-- Responsive CSS -->
    <link rel="stylesheet" href="include/layout/css/responsive.css"media="all">
<link rel="stylesheet" href="include/layout/css/socio.css"media="all">
</head>

<body>
   <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>

   <?php  include"include/template/header.php" ?>

   

         <div class="s003"   style="background-image: url(include/layout/img/bg-img/hero1.jpg);">
      <form action="recherche_med.php" method="POST">
        <div class="inner-form"> 
          <div class="input-field second-wrap">
            <input id="search" type="text"  name="nom" placeholder="Entrer Le nom de Medecin ?" />
          </div>
          <div class="input-field first-wrap">
            <div class="input-select">
        
               <select  data-trigger="" name="sp">
                <option  value='' disabled selected >Specialité</option>
       <option value="cardiologue">cardiologue </option>
                        <option value="chirurgie  orthopedique et traumatologie">chirurgie orthopedique </option>
                        <option value="Gastroenterologue">Gastroenterologue</option>
                        <option value="Ophtalmologue">Ophtalmologue </option>
                        <option value="PSYCHIATRE">PSYCHIATRE </option>
                        <option value="Gynecologogie Obstetrique">Gynecologogie Obstetrique</option>
                        <option value="pneumologue">pneumologue </option>
                        <option value="Dermatologue">Dermatologue </option>
                          <option value="hématologie">hématologie </option>
                        <option value="Neurochirurgie">Neurochirurgie </option>
                        <option value="pediatre">pediatre </option>
                          <option value="Neuropathologie">Neuropathologie </option>
                        <option value="Radiologie">Radiologie </option>
                        <option value="generaliste">generaliste</option>
                        <option value="chirurgie dentaire">chirurgie dentaire</option>
                        <option value="chirurgie dentaire et ODF">chirurgie dentaire et ODF</option>
              </select>
       
            </div>
          </div>
            <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="adresse">
              <option  value='' disabled selected >Commune</option>
                <option placeholder="" >Tlemcen</option>
                  <option placeholder="" >Remchi</option>
                    <option placeholder="" >Maghnia</option>
                      <option placeholder="" >Nedroma</option>
                     <option placeholder="" >Ghazaouet</option>
                 <option placeholder="" >Hennaya</option>
              
                 
              </select>
            </div>
          </div>
       
          <div class="input-field third-wrap">
            <button  class="btn-search" type="submit"  >
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" >
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
 </div>
    <script src="include/layout/js/js1/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
   

<br><br><?php 

 include "include/template/footer.php";  ?>

