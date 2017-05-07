

<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="js/jquery.easing.min.js" type="text/javascript"></script>
   </head>
   <body class="container">
      <form name="basicform" id="basicform" method="POST" action="addnewbirdresponse.php">
         <!-- id will be unique, but class name will be same -->
         <div id="sf1" class="frm">
            <fieldset>
               <legend>Step 1 of 4</legend>
               <div class="form-group">
                  <div class="row">
                     <label class="col-lg-4 control-label" for="birdname">Bird Name</label>  
                     <div class="col-lg-6">
                        <input type="text" name="birdname">
                     </div>
                  </div>
                  <br><br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="sceintificbirdname"> Scientific Name</label>
                     <div class="col-lg-6">
                        <input type="text" name="scientificbirdname">
                     </div>
                  </div>
                  <br><br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="size">Size </label>
                     <div class="col-lg-6">
                        <input type="radio" name="size" value="1" checked> Sparrow sizes or smaller<br>
                        <input type="radio" name="size" value="2"> Between sparrow and pigeon<br>
                        <input type="radio" name="size" value="3"> Pigeon<br>
                        <input type="radio" name="size" value="4"> Between Hen and Pigeon<br>
                        <input type="radio" name="size" value="5"> Hen<br>
                        <input type="radio" name="size" value="6"> Between Hen and Peacock<br>
                        <input type="radio" name="size" value="7"> Peacock sized or larger<br><br>
                     </div>
                  </div>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="Category">Category </label>
                     <div class="col-lg-6">
                        <input type="radio" name="Category" value="1" checked> Waders<br>
                        <input type="radio" name="Category" value="2"> Duck like<br>
                        <input type="radio" name="Category" value="3"> Perching<br>
                        <input type="radio" name="Category" value="4"> Birds of prey<br>
                        <input type="radio" name="Category" value="5"> Upland Ground<br>
                        <input type="radio" name="Category" value="6"> Tree Clinginh<br>
                        <input type="radio" name="Category" value="7"> Seabirds<br>
                        <input type="radio" name="Category" value="8"> Night birds<br>
                        <input type="radio" name="Category" value="9"> Flightless Birds<br>
                     </div>
                  </div><br><br>
				 <div class="row">
                     <label class="col-lg-4 control-label" for="color">Color</label>
                     <div class="col-lg-6">
                        <input type="text" name="color" placeholder="BROWN">
                     </div>
                  </div><br><br>
				
				<div class="row">
                     <label class="col-lg-4 control-label" for="color">Common Name(If any)</label>
                     <div class="col-lg-6">
                        <input type="text" name="commonname" placeholder="Bird Commonname">
                     </div>
                  </div>

               </div>
            </fieldset>
         </div>
         <div id="sf2" class="frm">
            <fieldset>
               <legend>Step 2 of 4</legend>
               <div class="form-group">
                  <div class="row">
                     <label class="col-lg-4 control-label" for="date">Date </label>
                     <input   type="date"  id="date" name="date" placeholder="dd-mm-yy">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="country">Country </label>
                     <input type="text" name="country">
                  </div>
                  <br>	
                  <div class="row">
                     <label class="col-lg-4 control-label" for="state">State </label>
                     <input type="text" name="state">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="city">City </label>
                     <input type="text" name="city">
                  </div>
                  <br>
                  <div class="row">
                     <label class="col-lg-4 control-label" for="area">Area </label>
                     <input type="text" name="area">
                  </div>
                  <br>
               </div>
               <div class="clearfix" style="height: 10px;clear: both;"></div>
            </fieldset>
         </div>
	    
		<div id="sf3" class="frm">
            <fieldset>
               <legend>Step 3 of 4</legend>
               <div class="form-group">
               

                  <div class="row">
                     <label class="col-lg-4 control-label" for="Description">Description Link </label>
                     <input type="text" name="Description">
                  </div>
                  <br>	

                  <div class="row">
                     <label class="col-lg-4 control-label" for="Habitat">Habitat </label>
                     <input type="text" name="Habitat">
                  </div>
                  <br>

                  <div class="row">
                     <label class="col-lg-4 control-label" for="Food">Food </label>
                     <input type="text" name="Food">
                  </div>
                  <br>

                  <div class="row">
                     <label class="col-lg-4 control-label" for="Order">Order </label>
                     <input type="text" name="Order">
                  </div>
                  <br>

				  <div class="row">
                     <label class="col-lg-4 control-label" for="Family">Family </label>
                     <input type="text" name="Family">
                  </div>
                  <br>
					
				 <div class="row">
                     <label class="col-lg-4 control-label" for="extinctionrisk">Extinction Risk </label>
                     <input type="text" name="extinctionrisk">
                  </div>
                  <br>

               </div>
               <div class="clearfix" style="height: 10px;clear: both;"></div>
            </fieldset>
         </div>
				



				<input type="submit">
      </form>
   </body>
</html>

