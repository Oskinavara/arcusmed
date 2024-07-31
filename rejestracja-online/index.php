<?php
/**
 * Nazwa projektu: Skrypt do terminarza online programu SmartDental
 * Autor: Software Clinic s.c. Jakub Kornaś, Tomasz Kozerski
 * Data: Wrzesień 2023
 * Opis: Pozwala pacjentom tworzyć profil użytkownika, wyszukiwać wolne terminy u lekarzy pracujących w danym gabinecie, zgłaszać chęć wizyty, śledzić jej status oraz edytować lub odwoływać wizyty. Moduł ten jest w pełni zintegrowany z programem pracującym na komputerach zainstalowanych w gabinecie stomatologicznym, co pozwala publikować wolne terminy internetowe z poziomu komputerów stacjonarnych.
 * Wersja: 1.0.0.1
 * 
 * Prawa Autorskie: (c) 2023 Software Clinic
 *
 * Ten produkt jest objęty licencją komercyjną i jest chroniony prawem autorskim.
 * Nieautoryzowane kopiowanie, modyfikowanie, dystrybucja, publiczne wyświetlanie
 * lub używanie tego oprogramowania jest surowo zabronione.
 * 
 * Licencja: Komercyjna. Wszelkie prawa zastrzeżone.
 * 
 * Aby uzyskać więcej informacji na temat licencji, prosimy o kontakt pod adresem kontakt@software-clinic.pl.
 * Używane Biblioteki:
 * DevExtreme by Developer Express Inc. (wersja: 23.1.3) - Wszelkie prawa zastrzeżone
 *
 */
session_start(); // Starting Session
require_once 'config.php';
$user_login = $_SESSION["prawid_uzyt_email"];
$token = $_GET['token'];
?>
<!DOCTYPE html>
<html data-n-head-ssr lang="en" data-n-head="%7B%22lang%22:%7B%22ssr%22:%22en%22%7D%7D">
<head>
  <title>Rejestracja online | ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie</title>
  <meta data-n-head="ssr" charset="utf-8" />
  <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1" />
  <meta data-n-head="ssr" data-hid="description" name="description" content="Przychodnia Arcus-Med w Częstochowie. Medycyna oparta na faktach - Evidence Based Medicine Poradnia lekarska i gabinety stomatologicznę. Umów wizytę." />
  <meta data-n-head="ssr" name="format-detection" content="telephone=no" />
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/23.1.3/css/dx.common.css">
  <link rel="stylesheet" type="text/css" href="css/dx.light.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="css/brands.css">
  <link rel="stylesheet" type="text/css" href="css/solid.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/dx.all.js"></script>
  <script src="https://cdn3.devexpress.com/jslib/23.1.4/js/localization/dx.messages.de.js"></script>
  <script src="js/globalize.js"></script>
  <script src="js/globalize.cultures.js"></script>
  <link data-n-head="ssr" rel="icon" type="image/png" href="/favicon.png" />
  <link data-n-head="ssr" data-hid="gf-prefetch" rel="dns-prefetch" href="https://fonts.gstatic.com/" />
  <link data-n-head="ssr" data-hid="gf-preconnect" rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
  <link data-n-head="ssr" data-hid="gf-preload" rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@400&amp;family=Poppins:wght@200;300;400;600" />
  <script data-n-head="ssr" data-hid="gf-script">
    (function() {
      var l = document.createElement("link");
      l.rel = "stylesheet";
      l.href = "https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@400&family=Poppins:wght@200;300;400;600";
      document.querySelector("head").appendChild(l);
    })();
  </script>
  <noscript data-n-head="ssr" data-hid="gf-noscript">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@400&family=Poppins:wght@200;300;400;600" />
  </noscript>
  <style data-vue-ssr-id="3191d5ad:0">
    .nuxt-progress {
      position: fixed;
      top: 0px;
      left: 0px;
      right: 0px;
      height: 2px;
      width: 0%;
      opacity: 1;
      transition: width 0.1s, opacity 0.4s;
      background-color: black;
      z-index: 999999;
    }
    .nuxt-progress.nuxt-progress-notransition {
      transition: none;
    }
    .nuxt-progress-failed {
      background-color: red;
    }
  </style>
  <style data-vue-ssr-id="0e36c2db:0">
    .nuxt__build_indicator[data-v-71e9e103] {
      box-sizing: border-box;
      position: fixed;
      font-family: monospace;
      padding: 5px 10px;
      border-radius: 5px;
      box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
      width: 88px;
      z-index: 2147483647;
      font-size: 16px;
      line-height: 1.2rem;
    }
    .v-enter-active[data-v-71e9e103],
    .v-leave-active[data-v-71e9e103] {
      transition-delay: 0.2s;
      transition-property: all;
      transition-duration: 0.3s;
    }
    .v-leave-to[data-v-71e9e103] {
      opacity: 0;
      transform: translateY(20px);
    }
    svg[data-v-71e9e103] {
      display: inline-block;
      vertical-align: baseline;
      width: 1.1em;
      height: 0.825em;
      position: relative;
      top: 1px;
    }
  </style>
  <style data-vue-ssr-id="20f4381e:0">
    .default__main {
      padding-top: 7rem;
    }
    @media screen and (min-width: 900px) {
      .default__main {
        padding-top: 8.25rem;
      }
    }
    .default__input {
      position: fixed;
      top: 60px;
      right: 44px;
      display: block;
      z-index: 1000;
    }
    /* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/
    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
      margin: 0;
      padding: 0;
      border: 0;
      font-size: 100%;
      font: inherit;
      vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
      display: block;
    }
    body {
      line-height: 1;
    }
    ol,
    ul {
      list-style: none;
    }
    blockquote,
    q {
      quotes: none;
    }
    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
      content: "";
      content: none;
    }
    table {
      border-collapse: collapse;
      border-spacing: 0;
    }
    body {
      color: #333;
      background: white;
      font-family: "Poppins", sans-serif;
      overflow-y: scroll;
    }
    html {
      scroll-behavior: smooth;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 300;
    }
    h1 {
      font-size: 2.3rem;
    }
    @media screen and (min-width: 900px) {
      h1 {
        font-size: 3rem;
      }
    }
    h2 {
      font-size: 1.8rem;
    }
    @media screen and (min-width: 900px) {
      h2 {
        font-size: 2.3rem;
      }
    }
    h3 {
      font-size: 2rem;
    }
    p {
      line-height: 1.5em;
    }
    li {
      line-height: 1.3;
    }
    img {
      max-width: 100%;
      display: block;
    }
    a {
      text-decoration: none;
      color: inherit;
    }
    .page {
      max-width: 1440px;
      margin: 0 auto;
    }
    .page-enter-active,
    .page-leave-active {
      transition: opacity 0.1s;
    }
    .page-enter,
    .page-leave-to {
      opacity: 0;
    }
    :root {
      --primary: #8e75ae;
    }
  </style>
  <style data-vue-ssr-id="41ffbef3:0">
    .header[data-v-72292c93] {
      background: white;
      position: fixed;
      top: 0;
      width: 100%;
      align-items: center;
      z-index: 100;
      box-shadow: 0 4px 8px -7px rgba(0, 0, 0, 0.25);
    }
    .header__inner[data-v-72292c93] {
      max-width: 1440px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 2.5rem;
      margin: 0 auto;
      padding: 0.75rem 1.25rem;
    }
    @media screen and (min-width: 900px) {
      .header__inner[data-v-72292c93] {
        padding: 0 1.25rem;
        height: 6rem;
      }
    }
    .header__logo[data-v-72292c93] {
      font-size: 48px;
      text-decoration: none;
      color: black;
    }
    .header__logo img[data-v-72292c93] {
      width: 8rem;
    }
    @media screen and (min-width: 900px) {
      .header__logo img[data-v-72292c93] {
        width: 14rem;
      }
    }
    .header .hamburger {
      grid-column: 3;
      justify-self: end;
    }
    @media screen and (min-width: 900px) {
      .header .hamburger {
        display: none;
      }
    }
    .header .navigation[data-v-72292c93] {
      display: none;
    }
    @media screen and (min-width: 900px) {
      .header .navigation[data-v-72292c93] {
        display: block;
      }
    }
    .header .mobile-menu[data-v-72292c93] {
      transform: translate(0, 0);
    }
    .header .slide-leave-active[data-v-72292c93],
    .header .slide-enter-active[data-v-72292c93] {
      transition: 0.3s;
    }
    .header .slide-enter[data-v-72292c93] {
      transform: translate(100%, 0);
    }
    .header .slide-leave-to[data-v-72292c93] {
      transform: translate(100%, 0);
    }
  </style>
  <style data-vue-ssr-id="52dab290:0">
    .top-bar[data-v-6183b499] {
      text-align: center;
      padding: 8px 20px;
      color: rgba(165, 165, 165, 0.75);
      font-weight: 300;
      line-height: 1.3;
      font-size: 12px;
    }
    @media screen and (min-width: 768px) {
      .top-bar[data-v-6183b499] {
        font-size: 16px;
      }
    }
    .top-bar span[data-v-6183b499],
    .top-bar a[data-v-6183b499] {
      color: var(--primary);
    }
  </style>
  <style data-vue-ssr-id="ee98f888:0">
    .navigation[data-v-21fe78a2] {
      font-family: "Fira Sans Condensed", sans-serif;
      align-self: center;
      justify-self: center;
      place-self: center;
    }
    .navigation__list[data-v-21fe78a2] {
      display: flex;
      list-style: none;
    }
    .navigation__list-item[data-v-21fe78a2] {
      margin: 0 0.5rem;
    }
    .navigation__link[data-v-21fe78a2] {
      display: block;
      padding: 1rem 0.2rem;
      color: black;
      white-space: nowrap;
      text-decoration: none;
      margin: 1rem 0;
      border-bottom: 1px solid transparent;
      transition: border-bottom-color 0.2s;
    }
    @media screen and (min-width: 1150px) {
      .navigation__link[data-v-21fe78a2] {
        padding: 0.75rem;
      }
    }
    .navigation__link.nuxt-link-exact-active[data-v-21fe78a2],
    .navigation__link[data-v-21fe78a2]:hover {
      border-bottom: 1px solid rgba(29, 37, 53, 0.4);
    }
    .navigation.mobile .navigation__list[data-v-21fe78a2] {
      flex-direction: column;
    }
    .navigation.mobile .navigation__link[data-v-21fe78a2] {
      margin: 0.5rem;
      padding: 0.5rem;
    }
  </style>
  <style data-vue-ssr-id="bd98499e:0">
    .hamburger {
      z-index: 1;
      background: white;
      border-radius: 10px;
      border: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0;
      width: 24px;
      transition: background-color 0.2s;
    }
    .hamburger__icon {
      max-width: 1.5rem;
      filter: invert(0.2);
    }
  </style>
  <style data-vue-ssr-id="4c2e8e40:0">
    .mobile-menu[data-v-26973788] {
      padding: 2rem 4rem 2rem 1rem;
      box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.07);
      height: 100%;
      position: fixed;
      right: 0;
      top: 0;
      background: white;
      transition: transform 0.3s ease-in-out;
    }
  </style>
  <style data-vue-ssr-id="8b05b01a:0">
    @media screen and (min-width: 900px) {
      .rejestracja-online[data-v-4d6ae919] {
        padding: 0 20px;
      }
    }
    .rejestracja-online img[data-v-4d6ae919] {
      height: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }
    .rejestracja-online__wrapper[data-v-4d6ae919] {
      display: grid;
      grid-template-columns: 0.1fr 1fr 0.1fr;
      margin: 2rem 0;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online__wrapper[data-v-4d6ae919] {
        grid-template-rows: 0.8fr 0.3fr 0.7fr;
        grid-template-columns: 1fr 0.2fr 0.45fr 0.5fr;
        margin: 4rem 0;
      }
    }
    .rejestracja-online__wrapper h2[data-v-4d6ae919] {
      font-weight: 300;
      margin-bottom: 1rem;
      font-size: 24px;
    }
    .rejestracja-online h1[data-v-4d6ae919] {
      padding: 2rem 1.5rem 0;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online h1[data-v-4d6ae919] {
        padding: 2rem 0 1rem;
      }
    }
    .rejestracja-online__text-wrapper[data-v-4d6ae919] {
      padding: 1.5em;
      background: white;
      grid-column: 1 / span 2;
      grid-row: 1 / span 1;
      z-index: 2;
      box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.05);
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online__text-wrapper[data-v-4d6ae919] {
        padding: 2em;
        grid-column: 2 / span 3;
        grid-row: 2 / span 2;
      }
    }
    .rejestracja-online__text-wrapper p[data-v-4d6ae919] {
      padding: 0.5em 0;
      font-weight: 300;
      font-size: 14px;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online__text-wrapper p[data-v-4d6ae919] {
        font-size: 16px;
      }
    }
    .rejestracja-online__image-wrapper[data-v-4d6ae919] {
      max-height: 45vh;
      position: relative;
      grid-column: 2 / span 2;
      grid-row: 2 / span 2;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online__image-wrapper[data-v-4d6ae919] {
        grid-column: 1 / span 2;
        grid-row: 1 / span 2;
      }
    }
    .rejestracja-online__image-wrapper[data-v-4d6ae919]::after {
      display: none;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online__image-wrapper[data-v-4d6ae919]::after {
        content: "";
        z-index: -1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        background: var(--primary);
        transform: translate(8em, 5em);
      }
    }
    .rejestracja-online .inverted[data-v-4d6ae919] {
      grid-template-columns: 0.1fr 1fr 0.1fr;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online .inverted[data-v-4d6ae919] {
        grid-template-rows: 0.5fr 1fr 0.5fr;
        grid-template-columns: 1fr 0.1fr 0.45fr 0.5fr;
      }
    }
    .rejestracja-online .inverted .rejestracja-online__text-wrapper[data-v-4d6ae919] {
      grid-column: 2 / span 2;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online .inverted .rejestracja-online__text-wrapper[data-v-4d6ae919] {
        grid-column: 1 / span 2;
        grid-row: 1 / span 2;
      }
    }
    .rejestracja-online .inverted .rejestracja-online__image-wrapper[data-v-4d6ae919] {
      grid-column: 1 / span 2;
      max-height: 500px;
    }
    @media screen and (min-width: 900px) {
      .rejestracja-online .inverted .rejestracja-online__image-wrapper[data-v-4d6ae919] {
        grid-column: 2 / span 3;
        grid-row: 2 / span 2;
      }
    }
    .rejestracja-online .inverted .rejestracja-online__image-wrapper img[data-v-4d6ae919] {
      z-index: 3;
    }
    .rejestracja-online .inverted .rejestracja-online__image-wrapper[data-v-4d6ae919]::after {
      transform: translate(-8em, -3em);
    }
  </style>
  <style>
    .hamburger {
      position: relative;
      z-index: 1001;
      /* Ensure the hamburger icon is above the mobile menu */
    }
    .mobile-menu {
      transform: translateX(100%);
      padding: 2rem 4rem 2rem 1rem;
      box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.07);
      height: 100%;
      position: fixed;
      right: 0;
      top: 0;
      background: white;
      transition: transform 0.3s ease-in-out;
      z-index: 1000;
      /* Ensure the mobile menu is below the hamburger icon */
    }
    .mobile-menu.open {
      transform: translateX(0);
    }
  </style>
</head>
<body>
  <div data-server-rendered="true" id="__nuxt">
    <!----><!---->
    <div id="__layout">
      <div class="default">
        <header class="header" data-v-72292c93>
          <div class="top-bar" data-v-6183b499 data-v-72292c93>
            Skontaktuj się z nami telefonicznie:
            <a href="tel:506407833" data-v-6183b499>506 407 833</a> w godzinach <span data-v-6183b499>8:30 - 19:00</span>
          </div>
          <div class="header__inner" data-v-72292c93>
            <a href="/" class="header__logo nuxt-link-active" data-v-72292c93><img alt="Arcus Med logo" src="/_nuxt/img/arcus.547ed1e.svg" data-v-72292c93 /></a>
            <nav class="navigation" data-v-21fe78a2 data-v-72292c93>
              <ul class="navigation__list" data-v-21fe78a2>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/o-nas" aria-current="page" class="navigation__link" data-v-21fe78a2>
                    O nas
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/oferta" class="navigation__link" data-v-21fe78a2>
                    Oferta
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/specjalisci" class="navigation__link" data-v-21fe78a2>
                    Specjaliści
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/cennik" class="navigation__link" data-v-21fe78a2>
                    Cennik
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/certyfikaty" class="navigation__link" data-v-21fe78a2>
                    Certyfikaty
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/galeria" class="navigation__link" data-v-21fe78a2>
                    Galeria
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/rejestracja-online/" class="nuxt-link-exact-active nuxt-link-active navigation__link nuxt-link-exact-active" data-v-21fe78a2>
                    Rejestracja online
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/umow-wizyte" class="navigation__link" data-v-21fe78a2>
                    Umów wizytę
                  </a>
                </li>
                <li class="navigation__list-item" data-v-21fe78a2>
                  <a href="/kontakt" class="navigation__link" data-v-21fe78a2>
                    Kontakt
                  </a>
                </li>
              </ul>
            </nav>
            <button aria-label="Menu" id="hamburger" class="hamburger">
              <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHBhdGggZD0iTSA0IDcgTCA0IDkgTCAyOCA5IEwgMjggNyBaIE0gNCAxNSBMIDQgMTcgTCAyOCAxNyBMIDI4IDE1IFogTSA0IDIzIEwgNCAyNSBMIDI4IDI1IEwgMjggMjMgWiIvPjwvc3ZnPg==" alt class="hamburger__icon open" data-v-4db208be />
              <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHBhdGggZD0iTSA3LjIxODc1IDUuNzgxMjUgTCA1Ljc4MTI1IDcuMjE4NzUgTCAxNC41NjI1IDE2IEwgNS43ODEyNSAyNC43ODEyNSBMIDcuMjE4NzUgMjYuMjE4NzUgTCAxNiAxNy40Mzc1IEwgMjQuNzgxMjUgMjYuMjE4NzUgTCAyNi4yMTg3NSAyNC43ODEyNSBMIDE3LjQzNzUgMTYgTCAyNi4yMTg3NSA3LjIxODc1IEwgMjQuNzgxMjUgNS43ODEyNSBMIDE2IDE0LjU2MjUgWiIvPjwvc3ZnPg==" alt class="hamburger__icon close" style="display: none;" data-v-4db208be />
            </button>
            <div id="mobileMenu" class="mobile-menu">
              <nav class="navigation mobile" data-v-21fe78a2 data-v-26973788>
                <ul class="navigation__list" data-v-21fe78a2>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/" class="nuxt-link-active navigation__link" data-v-21fe78a2>
                      Strona główna
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/o-nas" class="navigation__link" data-v-21fe78a2>
                      O nas
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/oferta" class="navigation__link" data-v-21fe78a2>
                      Oferta
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/specjalisci" class="navigation__link" data-v-21fe78a2>
                      Specjaliści
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/cennik" class="navigation__link" data-v-21fe78a2>
                      Cennik
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/certyfikaty" class="navigation__link" data-v-21fe78a2>
                      Certyfikaty
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/galeria" class="navigation__link" data-v-21fe78a2>
                      Galeria
                    </a>
                  </li>
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/rejestracja-online/" aria-current="page" class="nuxt-link-exact-active nuxt-link-active navigation__link nuxt-link-exact-active" data-v-21fe78a2>
                      Rejestracja online
                    </a>
                  </li>
				  <li class="navigation__list-item" data-v-21fe78a2>
				    <a href="/umow-wizyte" class="navigation__link" data-v-21fe78a2>
					  Umów wizytę
				    </a>
				  </li>				  
                  <li class="navigation__list-item" data-v-21fe78a2>
                    <a href="/kontakt" class="navigation__link" data-v-21fe78a2>
                      Kontakt
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </header>
        <main class="default__main">
          <div class="rejestracja-online page" data-v-4d6ae919>
            <h1 data-v-4d6ae919>Rejestracja online</h1>
            <div id="container">
              <div id="content">
              </div>
              <div id="sidebar">
                <div class="form">
                  <div class="dx-fieldset">
                    <div id="login-container">
                      <p class="loginTitle">Użytkownik</p>
                      <p id="loggedUser">
                        <?php echo $user_login; ?>
                      </p>
                      <div>
                        <div id="logoutButton"></div>
                      </div>
                    </div>
                    <div id="logout-container">
                      <p class="loginTitle">Logowanie klienta</p>
                      <div id="userDataForm"></div>
                    </div>
                    <div id="menu">
                      <ul id="login-menu">
                        <li data-url="views/choose_worker.php">Wolne terminy</li>
                        <li data-url="views/user_visits.php">Twoje terminy</li>
                        <li data-url="views/user_data.php">Twoje dane</li>
                        <li data-url="views/change_password_form.php">Zmień hasło</li>
                      </ul>
                      <ul id="logout-menu">
                        <li data-url="views/choose_worker.php">Wolne terminy</li>
                        <li data-url="views/register_user_form.php">Rejestracja</li>
                        <li data-url="views/remind_password_form.php">Zapomniane hasło?</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
              $(function() {
                DevExpress.localization.locale(navigator.language);
                
                changemenu();
                loadContent();

                var loginForm = $("#userDataForm").dxForm({
                  formData: {
                    email: "",
                    password: ""
                  },
                  colCount: 1,
                  labelLocation: "top",
                  items: [{
                      dataField: "email",
                      label: {
                        text: "Adres email"
                      },
                      editorType: "dxTextBox"
                    },
                    {
                      dataField: "password",
                      label: {
                        text: "Hasło"
                      },
                      editorType: "dxTextBox",
                      editorOptions: {
                        mode: "password"
                      }
                    },
                    {
                      itemType: "button",
                      horizontalAlignment: "left",
                      buttonOptions: {
                        text: "Zaloguj się",
                        type: "success",
                        onClick: function(e) {
                          var formData = loginForm.option("formData");
                          // Wysłanie żądania AJAX do serwera
                          $.ajax({
                            url: "views/user_login.php",
                            method: "POST",
                            data: {
                              email: formData.email,
                              password: formData.password
                            },
                            dataType: "json",
                            success: function(response) {
                              if (response.status === "success") {
                                DevExpress.ui.notify({
                                  message: response.message,
                                  width: 230,
                                  position: {
                                    my: "top",
                                    at: "top",
                                    of: "#container"
                                  }
                                }, "success", 5000);
                                changemenu();
                                $("#loggedUser").html(formData.email);
                              } else if (response.status === "failure") {
                                // Logowanie nieudane
                                DevExpress.ui.notify({
                                  message: response.message,
                                  width: 230,
                                  position: {
                                    my: "top",
                                    at: "top",
                                    of: "#container"
                                  }
                                }, "error", 5000);
                              }
                            },
                            error: function() {
                              DevExpress.ui.notify({
                                message: "Błąd serwera.",
                                width: 230,
                                position: {
                                  my: "top",
                                  at: "top",
                                  of: "#container"
                                }
                              }, "error", 5000);
                            }
                          });
                        }
                      }
                    }
                  ]
                }).dxForm("instance");

                $("#menu li").css("cursor", "pointer");
                $("#menu li").on("click", function() {
                  var url = $(this).data("url");
                  loadPage(url);
                });

                function loadContent() {
                  <?php if (isset($token)) : ?>
                    $("#content").load("include/verify_token.php?token=<?php echo $token; ?>");
                  <?php else : ?>
                    $("#content").load("views/choose_worker.php");
                  <?php endif; ?>
                }

                function changemenu() {
                  $.ajax({
                    url: 'include/islogin.php',
                    method: 'GET',
                    success: function(response) {
                      if (response.isLoggedIn) {
                        $("#login-container").show();
                        $("#logout-container").hide();
                        $("#login-menu").show();
                        $("#logout-menu").hide();
                      } else {
                        $("#login-container").hide();
                        $("#logout-container").show();
                        $("#login-menu").hide();
                        $("#logout-menu").show();
                      }
                    },
                    error: function(xhr, status, error) {
                      console.error('An error occurred while checking login status');
                    }
                  });
                }

                function loadPage(url) {
                  $.ajax({
                    url: url,
                    method: "GET",
                    success: function(response) {
                      $("#content").html(response);
                    },
                    error: function() {
                      $("#content").html("<p>Błąd wczytywania strony.</p>");
                    }
                  });
                }

                $("#email").dxTextBox({
                  mode: "email"
                }).dxValidator({
                  name: "Mail address", // The error message will be "Mail address is invalid"
                  validationRules: [{
                    type: "email"
                  }]
                });

                $('#password').dxTextBox({
                  mode: 'password',
                  placeholder: 'Enter password',
                  showClearButton: true,
                  inputAttr: {
                    'aria-label': 'Password'
                  },
                });

                $("#logoutButton").dxButton({
                  text: "Wyloguj się",
                  onClick: function() {
                    // Wywołaj funkcję obsługującą logowanie za pomocą AJAX
                    logoutUser();
                  }
                });

                function logoutUser() {
                  $.ajax({
                    url: "views/user_logout.php",
                    method: "POST",
                    dataType: "json",
                    success: function(response) {
                      if (response.status === "success") {
                        DevExpress.ui.notify({
                          message: response.message,
                          width: 230,
                          position: {
                            my: "top",
                            at: "top",
                            of: "#container"
                          }
                        }, "success", 5000);
                        $("#content").load("views/choose_worker.php");
                        changemenu();
                      } else if (response.status === "failure") {
                        DevExpress.ui.notify({
                          message: response.message,
                          width: 230,
                          position: {
                            my: "top",
                            at: "top",
                            of: "#container"
                          }
                        }, "error", 5000);
                      }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      var errorMessage = "Błąd serwera.";
                      if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                        errorMessage = jqXHR.responseJSON.message;
                      } else if (textStatus === "timeout") {
                        errorMessage = "Przekroczono limit czasu żądania.";
                      } else if (textStatus === "abort") {
                        errorMessage = "Żądanie zostało przerwane.";
                      } else {
                        errorMessage = "Wystąpił nieznany błąd.";
                      }
                      DevExpress.ui.notify({
                        message: errorMessage,
                        width: 230,
                        position: {
                          my: "top",
                          at: "top",
                          of: "#container"
                        }
                      }, "error", 5000);
                    }
                  });
                }
              });
            </script>
          </div>
        </main>
      </div>
    </div>
  </div>
  <script>
    // JavaScript logic to handle the hamburger menu
    document.addEventListener("DOMContentLoaded", function() {
      var hamburger = document.getElementById("hamburger");
      var mobileMenu = document.getElementById("mobileMenu");
      var menuOpenIcon = hamburger.querySelector(".hamburger__icon.open");
      var menuCloseIcon = hamburger.querySelector(".hamburger__icon.close");
      var menuOpen = false;
      function toggleMenu() {
        menuOpen = !menuOpen;
        if (menuOpen) {
          mobileMenu.classList.add('open');
          menuOpenIcon.style.display = 'none';
          menuCloseIcon.style.display = 'block';
        } else {
          mobileMenu.classList.remove('open');
          menuOpenIcon.style.display = 'block';
          menuCloseIcon.style.display = 'none';
        }
      }
      function clickOutside(event) {
        if (!hamburger.contains(event.target) && !mobileMenu.contains(event.target)) {
          menuOpen = false;
          mobileMenu.classList.remove('open');
          menuOpenIcon.style.display = 'block';
          menuCloseIcon.style.display = 'none';
        }
      }
      hamburger.addEventListener("click", toggleMenu);
      document.addEventListener("click", clickOutside);
    });
  </script>
</body>
</html>