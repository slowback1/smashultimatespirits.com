<?php include 'templates/header.php' ?>
<style>
    @import url("https://fonts.googleapis.com/css?family=Sarabun|Shrikhand");
/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
  display: block;
}

body {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

blockquote, q {
  quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
  content: "";
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

a {
  color: inherit;
  text-decoration: none;
}

.wrapper {
  width: 100%;
  min-height: 100%;
  display: flex;
  margin-top: 50px;
  flex-direction: column;
  align-items: center;
}

body {
  background-color: #222;
  color: #eee;
  display: flex;
  flex-direction: column;
}

#main {
  margin-left: 8%;
  margin-top: 35px;
  margin-bottom: 80px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 80%;
  justify-content: center;
}

a {
  color: inherit;
  text-decoration: none;
  width: 15%;
  height: 200px;
  margin-top: 10px;
}
a .spirit {
  margin-top: 10px;
  width: 100%;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
a .spirit p {
  font-family: "Shrikhand", cursive;
  font-size: 24px;
  color: #eee;
  align-self: center;
  padding: 2px;
}
a .spirit .imageContainer {
  margin: 0 auto;
  align-self: center;
  width: 100%;
  height: 180px;
  overflow: hidden;
  display: flex;
  justify-content: center;
}
a .spirit .imageContainer img {
  display: block;
  max-width: 80%;
  max-height: 100%;
  width: auto;
  height: auto;
  margin: 0 auto;
}
a .spirit h5 {
  padding-bottom: 5px;
  font-family: "Sarabun", sans-serif;
  font-size: 16px;
  text-align: center;
  align-self: center;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  width: 80vw;
  height: 80vh;
  margin: 0 auto;
  overflow: hidden;
  background-color: blue;
}

.hidden {
  display: none;
}

.quiz {
  width: 80vw;
}
.quiz input[type=radio] {
  width: 25%;
}
.quiz input[type=radio] img {
  width: 50%;
  height: auto;
}

.thumbnailIcon {
  width: auto;
  height: 30px;
}

.otherIcon {
  height: auto;
  width: 30px;
}

nav {
  width: 100%;
  height: 200px;
  background-image: url("../img/headerBG.png");
  background-size: cover;
  display: flex;
  flex-direction: column;
  align-items: center;
}
nav a {
  width: 80vw;
}
nav a h1 {
  margin-top: 20px;
  background-color: rgba(0, 0, 0, 0.5);
  color: #eee;
  padding: 5px;
  font-size: 32px;
  font-family: "Sarabun", sans-serif;
  text-align: center;
}
nav #searchBar {
  position: absolute;
  top: 200px;
  margin-bottom: 0;
}
nav #searchBar .livesearch {
  z-index: 1000000;
  background-color: #eee;
  color: #222;
}
nav #searchBar .livesearch .searchResult {
  background-color: white;
  color: blue;
}
nav input[type=text] {
  width: 50vw;
  margin: 0 auto;
  margin-bottom: 0;
  padding: 8px;
  border-radius: 10px;
}
nav input[type=submit] {
  padding: 8px 16px;
  border-radius: 10px;
  background-color: #fff;
  color: #222;
}
nav input[type=submit]:hover {
  background-color: #e0181c;
  border-color: #e0181c;
  color: #eee;
  cursor: pointer;
  transition: 0.5s;
}

#livesearch {
  z-index: 100;
  background-color: #eee;
  color: #222;
  display: flex;
  flex-direction: column;
}
#livesearch p {
  font-weight: bold;
}
#livesearch a {
  z-index: 100;
  width: 100%;
  height: 14px;
  font-size: 14px;
  padding: 2px;
  margin: 0;
}
#livesearch a:hover {
  cursor: pointer;
  background-color: #ccc;
  color: #222;
}

.adminLink {
  position: fixed;
  width: 15%;
  height: 30px;
  top: 0;
  left: 0;
  margin: 0;
  padding: 10px 16px;
  border-bottom-right-radius: 10px;
  background-color: #e0181c;
  color: #ccc;
}

.details {
  width: 100vw;
  height: 100vh;
  background-color: #00001a;
  color: #eee;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.details .dHead {
  width: 100%;
  height: 50px;
  margin-right: 0;
  margin-top: 25px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
.details .dHead a {
  max-height: 50px;
  z-index: 100;
}
.details .dHead .dSpacer {
  width: 30%;
  height: 60%;
  overflow-y: scroll;
}
.details .dHead .dHead p img {
  width: auto;
  height: 30px;
}
.details .dHead .dHead p .other {
  width: 30px;
  height: auto;
}
.details .dHead h1, .details .dHead h2 {
  text-align: center;
  color: #ccc;
}
.details .dHead h1 {
  font-size: 48px;
  font-family: "Shrikhand", cursive;
}
.details .dHead h2 {
  font-size: 24px;
  font-family: "Sarabun", sans-serif;
  opacity: 0.8;
}
.details .dHead a img {
  height: 24px;
  width: auto;
}
.details .dHead a .other {
  height: auto;
  width: 24px;
}
.details .dBody {
  margin-left: 0%;
  height: 100%;
  width: 100%;
  padding-left: 0%;
  display: flex;
  flex-direction: row;
  margin-top: 10px;
  justify-content: flex-start;
}
.details .dBody .dWrapper {
  overflow: hidden;
  width: 20%;
  height: 70%;
  border-top: 3px solid #3e6641;
}
.details .dBody .dWrapper .dSpacer {
  margin-left: 0;
  width: 110%;
  height: 100%;
  overflow-x: auto;
  overflow-y: scroll;
  padding-right: 15px;
}
.details .dBody .dWrapper .dSpacer a .listItem {
  padding: 15px 0;
  border-top: 1px solid #3e6641;
  display: flex;
  flex-direction: row;
  align-items: center;
}
.details .dBody .dWrapper .dSpacer a .listItem img {
  height: 30px;
  width: auto;
}
.details .dBody .dWrapper .dSpacer a .listItem .other {
  width: 30px;
  height: auto;
}
.details .dBody .dWrapper .dSpacer a .listItem p {
  margin-left: 15px;
}
.details .dBody .dRight {
  width: 100%;
  display: flex;
  flex-direction: row;
  border-left: 2px solid #3e6641;
}
.details .dBody .dRight .dImg {
  width: 35%;
  margin-left: 20px;
  align-self: flex-start;
}
.details .dBody .dRight .dImg img {
  width: 100%;
  height: auto;
}
.details .dBody .dRight .description {
  font-family: "Sarabun", sans-serif;
  width: 100%;
  height: 80%;
  margin-left: 15%;
  margin-right: 10%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.details .dBody .dRight .description h1 {
  color: #ffb909;
  font-size: 8em;
  transform: rotate(-10deg);
  margin-bottom: 1em;
  align-self: flex-start;
}
.details .dBody .dRight .description .tooBig {
  font-size: 4em;
}
.details .dBody .dRight .description h2 {
  display: flex;
  flex-direction: row;
  align-items: center;
  font-size: 24px;
  margin-top: 25px;
  color: #eee;
  padding: 10px 5px;
  border: 10px solid #abc898;
  border-radius: 5px;
  font-weight: 200;
  width: 70%;
  align-self: flex-start;
}
.details .dBody .dRight .description h2 img {
  width: 30px;
  height: auto;
  margin-right: 10px;
}
.details .dBody .dRight .description p {
  font-size: 20px;
  width: 80%;
}
.details .dBody .dRight .description .dDetails {
  background-color: #222;
  border: 10px solid #444;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  padding: 10px 5px;
  align-self: flex-start;
}
.details .dBody .dRight .description .dDetails p {
  font-size: 20px;
}
.details .dFoot {
  position: absolute;
  right: 0;
}
.details .dFoot a {
  width: 16px;
  height: 16px;
}
.details .dFoot a img {
  width: 16px;
  height: 16px;
}

.headIcon {
  width: 30px;
  height: auto;
}

#reverse {
  width: 10px;
  cursor: pointer;
}

#reverse img {
  width: 30px;
  height: 30px;
}

footer {
  padding: 50px 0;
  min-height: 100px;
  width: 100%;
  background-color: #454545;
  color: #ccc;
  display: flex;
  flex-direction: row;
}
footer p {
  margin: 0 auto;
  font-size: 12px;
}
footer p a {
  color: #dfdfdf;
}

.credits {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.credits h1 {
  font-size: 36px;
  align-self: center;
  font-weight: 400;
  margin-top: 35px;
}
.credits h3 {
  font-size: 24px;
  margin-top: 30px;
  font-weight: 200;
  margin-left: 30%;
}
.credits p {
  font-weight: 100;
  margin-top: 30px;
  margin-left: 45%;
}

@media only screen and (max-width: 1500px) {
  .details .dHead .leftArr {
    position: absolute;
    bottom: 2;
    left: 200px;
  }
  .details .dHead .centArr {
    position: absolute;
    bottom: 2;
  }
  .details .dHead .rightArr {
    position: absolute;
    bottom: 2;
    right: 2;
  }
  .details .dBody {
    margin-top: 10px;
  }
  .details .dBody .dRight .description h1 {
    font-size: 4em;
  }
  .details .dBody .dRight .description .tooBig {
    font-size: 2em;
  }
  .details .dBody .dRight .description p {
    font-size: 1em;
  }

  a {
    width: 24%;
  }
}
@media only screen and (max-width: 850px) {
  .details .dHead .leftArr {
    position: static;
  }
  .details .dHead .centArr {
    position: static;
  }
  .details .dHead .rightArr {
    position: static;
  }
  .details .dBody .dWrapper {
    display: none;
  }
  .details .dBody .dRight {
    border-left: none;
    flex-direction: column;
  }
  .details .dBody .dRight .dImg {
    align-self: center;
  }
  .details .dBody .dRight .description h1 {
    transform: rotate(0deg);
  }
  .details .dBody .dRight .description .tooBig {
    font-size: 1em;
  }

  a {
    width: 45%;
  }

  .adminLink {
    bottom: 0;
    border-bottom-right-radius: 0;
    border-top-right-radius: 10px;
  }

  .footer {
    flex-direction: column;
  }
}
@media only screen and (max-width: 450px) {
  a {
    width: 90%;
  }
}

/*# sourceMappingURL=style.css.map */

    
</style>
  <style>
  @import url("https://fonts.googleapis.com/css?family=Sarabun|Shrikhand");
/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
  display: block;
}

body {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

blockquote, q {
  quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
  content: "";
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

a {
  color: inherit;
  text-decoration: none;
}

.wrapper {
  width: 100%;
  min-height: 100%;
  display: flex;
  margin-top: 50px;
  flex-direction: column;
  align-items: center;
}

body {
  background-color: #222;
  color: #eee;
  display: flex;
  flex-direction: column;
}

#main {
  margin-left: 8%;
  margin-top: 35px;
  margin-bottom: 80px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 80%;
  justify-content: center;
}

a {
  color: inherit;
  text-decoration: none;
  width: 15%;
  height: 200px;
  margin-top: 10px;
}
a .spirit {
  margin-top: 10px;
  width: 100%;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
a .spirit p {
  font-family: "Shrikhand", cursive;
  font-size: 24px;
  color: #eee;
  align-self: center;
  padding: 2px;
}
a .spirit .imageContainer {
  margin: 0 auto;
  align-self: center;
  width: 100%;
  height: 180px;
  overflow: hidden;
  display: flex;
  justify-content: center;
}
a .spirit .imageContainer img {
  width: auto;
  height: 100%;
  margin: 0 auto;
}
a .spirit h5 {
  padding-bottom: 5px;
  font-family: "Sarabun", sans-serif;
  font-size: 16px;
  text-align: center;
  align-self: center;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  width: 80vw;
  height: 80vh;
  margin: 0 auto;
  overflow: hidden;
  background-color: blue;
}

.hidden {
  display: none;
}

.quiz {
  width: 80vw;
}
.quiz input[type=radio] {
  width: 25%;
}
.quiz input[type=radio] img {
  width: 50%;
  height: auto;
}

.thumbnailIcon {
  width: auto;
  height: 30px;
}

.otherIcon {
  height: auto;
  width: 30px;
}

nav {
  width: 100%;
  height: 200px;
  background-image: url("../img/headerBG.png");
  background-size: cover;
  display: flex;
  flex-direction: column;
  align-items: center;
}
nav a {
  width: 80vw;
}
nav a h1 {
  margin-top: 20px;
  background-color: rgba(0, 0, 0, 0.5);
  color: #eee;
  padding: 5px;
  font-size: 32px;
  font-family: "Sarabun", sans-serif;
  text-align: center;
}
nav #searchBar {
  position: absolute;
  top: 200px;
  margin-bottom: 0;
}
nav #searchBar .livesearch {
  z-index: 1000000;
  background-color: #eee;
  color: #222;
}
nav #searchBar .livesearch .searchResult {
  background-color: white;
  color: blue;
}
nav input[type=text] {
  width: 50vw;
  margin: 0 auto;
  margin-bottom: 0;
  padding: 8px;
  border-radius: 10px;
}
nav input[type=submit] {
  padding: 8px 16px;
  border-radius: 10px;
  background-color: #fff;
  color: #222;
}
nav input[type=submit]:hover {
  background-color: #e0181c;
  border-color: #e0181c;
  color: #eee;
  cursor: pointer;
  transition: 0.5s;
}

#livesearch {
  z-index: 100;
  background-color: #eee;
  color: #222;
  display: flex;
  flex-direction: column;
}
#livesearch p {
  font-weight: bold;
}
#livesearch a {
  z-index: 100;
  width: 100%;
  height: 14px;
  font-size: 14px;
  padding: 2px;
  margin: 0;
}
#livesearch a:hover {
  cursor: pointer;
  background-color: #ccc;
  color: #222;
}

.adminLink {
  position: fixed;
  width: 15%;
  height: 30px;
  top: 0;
  left: 0;
  margin: 0;
  padding: 10px 16px;
  border-bottom-right-radius: 10px;
  background-color: #e0181c;
  color: #ccc;
}

.details {
  width: 100vw;
  height: 100vh;
  background-color: #00001a;
  color: #eee;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.details .dHead {
  width: 100%;
  height: 50px;
  margin-right: 0;
  margin-top: 25px;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}
.details .dHead a {
  max-height: 50px;
  z-index: 100;
}
.details .dHead .dSpacer {
  width: 30%;
  height: 60%;
  overflow-y: scroll;
}
.details .dHead .dHead p img {
  width: auto;
  height: 30px;
}
.details .dHead .dHead p .other {
  width: 30px;
  height: auto;
}
.details .dHead h1, .details .dHead h2 {
  text-align: center;
  color: #ccc;
}
.details .dHead h1 {
  font-size: 48px;
  font-family: "Shrikhand", cursive;
}
.details .dHead h2 {
  font-size: 24px;
  font-family: "Sarabun", sans-serif;
  opacity: 0.8;
}
.details .dHead a img {
  height: 24px;
  width: auto;
}
.details .dHead a .other {
  height: auto;
  width: 24px;
}
.details .dBody {
  margin-left: 0%;
  height: 100%;
  width: 100%;
  padding-left: 0%;
  display: flex;
  flex-direction: row;
  margin-top: 10px;
  justify-content: flex-start;
}
.details .dBody .dWrapper {
  overflow: hidden;
  width: 20%;
  height: 70%;
  border-top: 3px solid #3e6641;
}
.details .dBody .dWrapper .dSpacer {
  margin-left: 0;
  width: 110%;
  height: 100%;
  overflow-x: auto;
  overflow-y: scroll;
  padding-right: 15px;
}
.details .dBody .dWrapper .dSpacer a .listItem {
  padding: 15px 0;
  border-top: 1px solid #3e6641;
  display: flex;
  flex-direction: row;
  align-items: center;
}
.details .dBody .dWrapper .dSpacer a .listItem img {
  height: 30px;
  width: auto;
}
.details .dBody .dWrapper .dSpacer a .listItem .other {
  width: 30px;
  height: auto;
}
.details .dBody .dWrapper .dSpacer a .listItem p {
  margin-left: 15px;
}
.details .dBody .dRight {
  width: 100%;
  display: flex;
  flex-direction: row;
  border-left: 2px solid #3e6641;
}
.details .dBody .dRight .dImg {
  width: 35%;
  margin-left: 20px;
  align-self: flex-start;
}
.details .dBody .dRight .dImg img {
  width: 100%;
  height: auto;
}
.details .dBody .dRight .description {
  font-family: "Sarabun", sans-serif;
  width: 100%;
  height: 80%;
  margin-left: 15%;
  margin-right: 10%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.details .dBody .dRight .description h1 {
  color: #ffb909;
  font-size: 8em;
  transform: rotate(-10deg);
  margin-bottom: 1em;
  align-self: flex-start;
}
.details .dBody .dRight .description .tooBig {
  font-size: 4em;
}
.details .dBody .dRight .description h2 {
  display: flex;
  flex-direction: row;
  align-items: center;
  font-size: 24px;
  margin-top: 25px;
  color: #eee;
  padding: 10px 5px;
  border: 10px solid #abc898;
  border-radius: 5px;
  font-weight: 200;
  width: 70%;
  align-self: flex-start;
}
.details .dBody .dRight .description h2 img {
  width: 30px;
  height: auto;
  margin-right: 10px;
}
.details .dBody .dRight .description p {
  font-size: 20px;
  width: 80%;
}
.details .dBody .dRight .description .dDetails {
  background-color: #222;
  border: 10px solid #444;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  padding: 10px 5px;
  align-self: flex-start;
}
.details .dBody .dRight .description .dDetails p {
  font-size: 20px;
}
.details .dFoot {
  position: absolute;
  right: 0;
}
.details .dFoot a {
  width: 16px;
  height: 16px;
}
.details .dFoot a img {
  width: 16px;
  height: 16px;
}

.headIcon {
  width: 30px;
  height: auto;
}

#reverse {
  width: 10px;
  cursor: pointer;
}

#reverse img {
  width: 30px;
  height: 30px;
}

footer {
  padding: 50px 0;
  min-height: 100px;
  width: 100%;
  background-color: #454545;
  color: #ccc;
  display: flex;
  flex-direction: row;
}
footer p {
  margin: 0 auto;
  font-size: 12px;
}
footer p a {
  color: #dfdfdf;
}

.credits {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.credits h1 {
  font-size: 36px;
  align-self: center;
  font-weight: 400;
  margin-top: 35px;
}
.credits h3 {
  font-size: 24px;
  margin-top: 30px;
  font-weight: 200;
  margin-left: 30%;
}
.credits p {
  font-weight: 100;
  margin-top: 30px;
  margin-left: 45%;
}

@media only screen and (max-width: 1500px) {
  .details .dHead .leftArr {
    position: absolute;
    bottom: 2;
    left: 200px;
  }
  .details .dHead .centArr {
    position: absolute;
    bottom: 2;
  }
  .details .dHead .rightArr {
    position: absolute;
    bottom: 2;
    right: 2;
  }
  .details .dBody {
    margin-top: 10px;
  }
  .details .dBody .dRight .description h1 {
    font-size: 4em;
  }
  .details .dBody .dRight .description .tooBig {
    font-size: 2em;
  }
  .details .dBody .dRight .description p {
    font-size: 1em;
  }

  a {
    width: 24%;
  }
}
@media only screen and (max-width: 850px) {
  .details .dHead .leftArr {
    position: static;
  }
  .details .dHead .centArr {
    position: static;
  }
  .details .dHead .rightArr {
    position: static;
  }
  .details .dBody .dWrapper {
    display: none;
  }
  .details .dBody .dRight {
    border-left: none;
    flex-direction: column;
  }
  .details .dBody .dRight .dImg {
    align-self: center;
  }
  .details .dBody .dRight .description h1 {
    transform: rotate(0deg);
  }
  .details .dBody .dRight .description .tooBig {
    font-size: 1em;
  }

  a {
    width: 45%;
  }

  .adminLink {
    bottom: 0;
    border-bottom-right-radius: 0;
    border-top-right-radius: 10px;
  }

  .footer {
    flex-direction: column;
  }
}
@media only screen and (max-width: 450px) {
  a {
    width: 90%;
  }
}

/*# sourceMappingURL=style.css.map */

      footer {
  padding: 50px 0;
  min-height: 100px;
  width: 100%;
  background-color: #454545;
  color: #ccc;
  display: flex;
  flex-direction: row;
}
footer p {
  margin: 0 auto;
  font-size: 12px;
}
footer p a {
  color: #dfdfdf;
}
#main {
    margin-left: 8%;
}
.message {
    position: absolute;
    margin-left: 25%;
    top: 300px;
    width: 50%;
    height: 100px;
    background-color: #efefef;
    color: #424242;
    font-size: 20px;
}
.message a {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
}
.message p {
    margin: 40px auto;
    text-align: center;
}
a .spirit .imageContainer img {
    margin: 0 auto;
    max-height: 142px;
    width: auto;
    max-width: -webkit-fill-available;
    overflow: hidden;
}
.message {
    position: absolute;
    top: 80px;
    width: 50%;
    height: 100px;
    background-color: #efefef;
    color: #424242;
    font-size: 20px;
    transition: 0.25s;
    border: 3px solid #424242;
    border-radius: 10px;
}
.message a {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
}
.message p {
    margin: 40px auto;
    text-align: center;
}
a .spirit .imageContainer .buzzbuzz {
  width: 16px;
  height: 16px;
}
  </style>
  <script>
      //close message window
          function closeMsg() {
        document.getElementById('message').style.display = "none";
    }
    document.addEventListener('click', function(e) {
        if (e.target.id != 'message') {
            document.getElementById('message').style.display = "none";
        }
    }, false);
  </script>
  <?php 
    if($_GET['ecode'] == 'failure') {
      echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Process failed, try again.  If this happens multiple times, contact the admin</p></div>";  
    }
    if($_GET['ecode'] == 'addsuccess') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Addition successful</p></div>";
    }
    if($_GET['ecode'] == 'editsuccess') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Edit successful</p></div>";
    }
    if($_GET['ecode'] == 'deletesuccess') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Deletion successful</p></div>";
    }
    if($_GET['ecode'] == 'passwordchange') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Password Change successful</p></div>";
    }
    if($_GET['ecode'] == 'registered') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Registration successful</p></div>";
    }
    if($_GET['ecode'] == 'accessdenied') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Begone, Hacker!</p></div>";
    }
    if($_GET['ecode'] == 'loginsuccess') {
        echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Login successful</p></div>";
    }
  ?>
    <div class="main" id="main">
        <?php include "connection/connect.php"; ?>
        <?php 
            $sql = "SELECT * FROM spirits ORDER BY id LIMIT 45";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if ($row['series'] == "Other") {
                        echo "<a href='details.php?id=".$row['id']."'><div class='spirit' id='".$row['id']."'><p class='hidden'>".$row['name']."</p><p class='hidden'>".$row['game']."</p><p class='hidden'>".$row['series']."</p><p class='hidden'>".$row['description']."</p><p><img src='./img/seriesIcons/".$row['series'].".png'< alt='icon' class='otherIcon' />". $row['id'] ."</p><div class='imageContainer')><img src='img/spiritImages/".$row['id'].".png'/></div><h5>".$row['name']."</h5></div></a>";
                    } else if($row['id'] == 575) {
                    echo "<a href='details.php?id=".$row['id']."'><div class='spirit' id='".$row['id']."'><p class='hidden'>".$row['name']."</p><p class='hidden'>".$row['game']."</p><p class='hidden'>".$row['series']."</p><p class='hidden'>".$row['description']."</p><p><img src='./img/seriesIcons/".$row['series'].".png'< alt='icon' class='thumbnailIcon' />". $row['id'] ."</p><div class='imageContainer')><img src='img/spiritImages/".$row['id'].".png' class='buzzbuzz'/></div><h5>".$row['name']."</h5></div></a>";
                    } else {
                      echo "<a href='details.php?id=".$row['id']."'><div class='spirit' id='".$row['id']."'><p class='hidden'>".$row['name']."</p><p class='hidden'>".$row['game']."</p><p class='hidden'>".$row['series']."</p><p class='hidden'>".$row['description']."</p><p><img src='./img/seriesIcons/".$row['series'].".png'< alt='icon' class='thumbnailIcon' />". $row['id'] ."</p><div class='imageContainer')><img src='img/spiritImages/".$row['id'].".png'/></div><h5>".$row['name']."</h5></div></a>";
                    }
                }
            } else {
                echo "<h3>No results!  Either the DB isn't set up yet or something's wrong with the DB</h3>";
            }
        
        ?>
    </div>
    <?php include 'templates/footer.php' ?>



<script>
    let loadCount = 1;
    function loadMore() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("main").innerHTML = document.getElementById('main').innerHTML + this.responseText;
            }
        };
        xmlhttp.open("GET", "actions/load_more.php?offset="+loadCount, true);
        xmlhttp.send();
        loadCount += 1;
    }
    /*
    window.onscroll = function(ev) {
        if((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            window.unbind('scroll');
            loadMore();
        }
    }
    */
    var footerEl = document.getElementById('footer');
var CheckIfScrollBottom = debouncer(function() {
	if(getDocHeight() <= getScrollXY()[1] + window.innerHeight + 250) {
       loadMore();
    }
},500);

document.addEventListener('scroll',CheckIfScrollBottom);

function debouncer(a,b,c){var d;return function(){var e=this,f=arguments,g=function(){d=null,c||a.apply(e,f)},h=c&&!d;clearTimeout(d),d=setTimeout(g,b),h&&a.apply(e,f)}}
function getScrollXY(){var a=0,b=0;return"number"==typeof window.pageYOffset?(b=window.pageYOffset,a=window.pageXOffset):document.body&&(document.body.scrollLeft||document.body.scrollTop)?(b=document.body.scrollTop,a=document.body.scrollLeft):document.documentElement&&(document.documentElement.scrollLeft||document.documentElement.scrollTop)&&(b=document.documentElement.scrollTop,a=document.documentElement.scrollLeft),[a,b]}
function getDocHeight(){var a=document;return Math.max(a.body.scrollHeight,a.documentElement.scrollHeight,a.body.offsetHeight,a.documentElement.offsetHeight,a.body.clientHeight,a.documentElement.clientHeight)}
</script>
<!--
<div class='modal' id='modal'>
    <div class="modal-content" id="modal-content"></div>
</div>

<script>
                var modal = document.getElementById("modal");
            var btns = document.getElementsByClassName("spirit");
            var content = document.getElementById('modal-content');
            
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', function(e) {
                    modal.style.display = "block";
                    console.log(e)
                    console.log(btns)
                    content.innerHTML = "<p>" + e.target.children[0].firstChild.data +"</p>"
                })
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            console.log(btns)
            console.log(btns[0].children[0].firstChild.data);
</script>
<!--
<div class='spirit' id='.$row['id']'>
    <p>. $row['id'] .</p>
    <div class="imageContainer">
        <img src='. $row['image']' alt='.$row['name']' />
    </div>
    <h5>.$row['name'].</h5>
</div>