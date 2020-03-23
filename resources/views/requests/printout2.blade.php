<!DOCTYPE html>
<html>
  <head>
   <style type="text/css">
     body {
        background: rgb(204,204,204); 
      }
      page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
      }
      page[size="A4"] {  
        width: 21cm;
        height: 29.7cm; 
      } 
      
      @media print {
        body, page {
          margin: 0;
          box-shadow: 0;
        }
      }
      .container{
        margin: 10px 10px;
      }
   </style>
  </head>
  <body>
      <page size="A4">
        <div class="container">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </page>
  </body>
</html>