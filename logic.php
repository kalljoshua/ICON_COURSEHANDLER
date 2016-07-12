<script src="/wp-includes/js/addInput.js" language="Javascript" type="text/javascript"></script>
<form action="logics.php" method="GET">
     <div id="dynamicInput">
					<label>Select</label>
                    <select class="form-control" name="idsubject" Required="true">
                        <option>Select College</option>
						<?php 
						include('db_connect.php');
							$query_college = mysqli_query($con,'SELECT * FROM subject');
							if(mysqli_num_rows($query_college)>0){
								while($rows = mysqli_fetch_array($query_college)){
									$idsubject = $rows['idsubject'];
									$name = $rows['name'];
									
							?>
							<option value='<?php echo $name; ?>'><?php echo $name; ?></option>
							<?php
								}
							
							}
						?>
                        
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
newdiv.innerHTML = "<label>Select</label> " + (counter + 1) + " <br><select class='form-control' name='idsubject' Required='true'><?php $query_college = mysqli_query($con,'SELECT * FROM subject'); if(mysqli_num_rows($query_college)>0){while($rows = mysqli_fetch_array($query_college)){$idsubject = $rows['idsubject'];$name = $rows['name'];?> <option value='<?php echo $name; ?>'> <?php echo $name; ?></option>  <?php }  }?></select>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>