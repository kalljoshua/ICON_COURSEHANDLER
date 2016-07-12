<script src="/wp-includes/js/addInput.js" language="Javascript" type="text/javascript"></script>
<form action="logics.php" method="GET">
     <div id="dynamicInput">
					<label>Select</label>
                    <select class="form-control" name="idcollege" Required="true">
                        <option value="math">Math</option>
					</select>
         
     </div>
     <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">
	 <input type="submit" value="submit" name="submit">
</form>

<script>
var counter = 1;
var limit = 7;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label>Select</label> " + (counter + 1) + " <br><select class='form-control' name='idcollege' Required='true'><option value='math"+(counter + 1)+"'>Select College</option></select>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>