<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Upcoming Conference</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />    
		   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">		   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" /> 
      </head>  
    <body>  

    <div class="container">  
                <h3 align="center">Upcoming Conference</h3>  
                <br />  
                <div class="">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  								
									<td>SERVERIP</td>
									<td>PROVIDER</td>
									<td>PILOTNUMBER</td>
									<td>TYPE</td>
									<td>COUNT</td>
									<td>CHANNELCOUNT</td>
                               </tr>  
                          </thead>  
                          <?php  
                       
						  //$result=getLiveConference();						 
						  if( sizeof($result) == 0 )
						  {
							echo '<tr><td colspan="7">no record found</td></tr>';   
						  }
						  else
						  {
							  foreach($result as $res)
								{
								echo '  
								   <tr> 
										<td>'.$res["ModeratorName"].'</td>
										<td>'.$res["MobileNumber"].'</td>
										<td>'.$res["Organization"].'</td> 
										<td>'.$res["ConferenceId"].'</td>	 	
										<td>'.$res["ConferenceDate"].'</td>  
										<td>'.$res["ConferenceTime"].'</td>  
										<td>'.$res["ConferenceType"].'</td>  
										<td>'.$res["TotalMembers"].'</td> 
								   </tr>  
								   ';  		
								}
							  
						  }
						  
							
							function getLiveConference()
							{
								//print_r($str_data);
								$urlToSend="http://43.242.212.245:8082/IVRRequest/api/CurrentCalls/GetNipponUpcomingConference";
								$ch = curl_init($urlToSend);
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_POST, 1);								
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
								curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));      				
								$result = curl_exec($ch);
								return json_decode($result,true);
							}

                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    
    
	<script type="text/javascript">
	$(document).ready(function() {
	$('#employee_data').DataTable( {
        dom: 'Bfrtip',
		order: [[ 4, "asc" ]],		
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
 } );
 </script>  
 
 </html>
