

<?php
$con=mysqli_connect("db",DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="select * from " . TB_ADD_DATA . " where id='" . $_GET['id'] . "' order by id DESC";
$result=mysqli_query($con,$sql);

// Associative array
$dbarr=mysqli_fetch_assoc($result);

echo '<pre>';
  print_r($dbarr);
echo '</pre>';

// declare variable
foreach($dbarr as $key => $value){
    $$key = $value;
}

// Time 

$date_of_birth_dmY = new DateTime($date_of_birth);
$date_of_birth_dmY = $date_of_birth_dmY->format("d-m-Y");

$year_now_BD = date("Y")+'543';
$date_today_Ymd = $year_now_BD . '-' . date("m-d");
$date_today_dmY = date("d-m") . '-' . $year_now_BD;



// Free result set
mysqli_free_result($result);

mysqli_close($con);
?>


<link type="text/css" href="javascript/flora.calendars.picker.css" rel="stylesheet"/>
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.plus.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.picker.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.thai.min.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.thai-th.js"></script>
<script type="text/javascript" src="javascript/jquery.calendars.picker-th.js"></script>
<script type="text/javascript">
$(function() {
   $('#mydate').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#datebirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_of_record').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#mybirth').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_transplantation').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_bio_report').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_follow_up').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_chemo').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_immun_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_rad_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_surgery_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_complete_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_progression_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_stem_cell_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_last_contact_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_date_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});
   $('#date_cr_complete_follow').calendarsPicker({calendar: $.calendars.instance('thai','th')});

 });
</script>
<script type="text/javascript" src="javascript/custom/follow_up.js"></script>

<!-- Style -->

<style type="text/css">

select {
    width: 90%;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
        background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; 
}
input[type=text]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=password]  {
    width: 150px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
button  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}
input[type=button]  {
    width: 250px;
    padding: 4px 5px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
    box-shadow: 0 0 3px #14283a; margin: 3px
}

textarea{
      width: 80%;
    padding: 5px 7px;
    border: none;
    border-radius: 4px;
    background-color: #ffffff;
 font-size: 15px;
  color:#18222e;
}

.sublayer-2 {
   margin-left: 40px;
   padding-top: 15px;
}

tr.color {
  background-color: #F4F4F4;
}
tr.color > td {
  padding: 16px 5px;
}

#Immunotherapy  td  {
  padding: 10px 5px;
}


</style>



<!-- Header -->
<?php include "modules/index/header.php";?>

<!-- main content -->
<table  style="width:100%;background-color:#e8e8e8;">
<tr bgcolor="#e8e8e8">
    <td style="padding-left:35px;padding-top:15px">
     <h1>Follow Up Data</h1>
    </td>
</tr>
</table>


<form name ="checkForm" action="?name=member&file=follow_registry_update" method="post" onSubmit="return check();"  enctype="multipart/form-data" id="frm_check">

                <!-- Identification and Baseline Data Table -->

  <table width="100%" border="0" align="center">

   <tr class="color" >
          <th colspan="4"><br /><h1>Identification and Baseline Data</h1></th>
   </tr>

   <tr class="color" >
          <th align="left" width="44%"><strong>Patient Code : </strong></th>
          <td align="left" width="56%"><strong><input type="hidden"  name="centre"  value="<?php echo $centre; ?>"  size="10"  readonly="readonly"/> *<?php echo $centre; ?></strong></td>
   </tr>
   <tr class="color" >
          <th align="left" width="44%">Patient Initials :</th>
          <td align="left" colspan="3"><input type="hidden" name="patient_initials" size="10"   value="<?php echo $patient_initials; ?>" maxlength="2" readonly="readonly" /> <?php echo strtoupper($patient_initials); ?></td>
   </tr>
   <tr class="color" >
          <th align="left" width="44%">Gender : </th>
          <td align="left" colspan="3">
            <input type="hidden"   name="sex" size="10" value="<?php echo $sex; ?>"  readonly="readonly" > <?php echo $sex; ?>
          </td>
    </tr>
    <tr class="color" >
          <th align="left" width="44%">Date of birth : </th>
          <td align="left" colspan="3">
           <input type="hidden" size="10"  name="date_of_birth" value="<?php echo $date_of_birth; ?>" maxlength="10"  readonly="readonly" >   <?php echo $date_of_birth_dmY; ?>      (พ.ศ.)
         </td>
     </tr>
     <tr class="color" >
        <th align="left" width="44%">Date of biopsy :  </th>
        <td align="left" colspan="3">
          <input type="hidden" name="date_bio_report"   value="<?php echo $date_bio_report; ?>"  size="10" readonly="readonly"/><?php echo $date_bio_report; ?>
        </td>
      </tr>

  </table>


                            <!-- Follow Up Data -->

  <table width="100%" border="0" align="center">
      <tr class="color" >
        <th align="center" colspan="2"><h1>Follow Up Data </h1></th>
      </tr>
      <tr class="color" >
        <th width="44%" align="left">Date of record Follow up :</th>
        <td width="56%" align="left">
         <input type="hidden" name="date_record_follow" id="date_follow_up" size="10" value="<?php echo $date_today_Ymd ?>"  />  <b><?php echo $date_today_dmY; ?> (พ.ศ.)</b>
       </td>
     </tr>
     <tr class="color" >
      <th align="left" colspan="2"><br /><font color="ff3333" size="+1">Initial Treatment (mark all that apply)</font><br /><br /></th>
    </tr>

    <!-- Chemotherapy -->

    <tr id="Chemotherapy" class="color" >
      <th><font color="ff3333">Chemotherapy </font></th>
      <td width="44%" align="center" colspan="2">
          <input name="chemotherapy_follow" 
                 id="chemotherapy_follow_yes" 
                 onclick="check_getsave()" 
                 type="radio" 
                 value="Chemotherapy"  
            <?php if ($chemotherapy_follow == "Chemotherapy") {
                  echo "checked";
              }
             ?>/> Yes &nbsp;&nbsp;&nbsp;

           <input name="chemotherapy_follow" 
                  id="chemotherapy_follow_no" 
                  onclick="check_getsave()"  
                  type="radio" 
                  value="No Chemotherapy" 
            <?php if ($chemotherapy_follow == "No Chemotherapy") {
                  echo "checked";
              }
              ?>/> No <br/>

              <!-- Chemotherapy Sub -->
          <div id="chemotherapy_follow_detail">
          <table width="500" border="0" cellpadding="0" cellspacing="0" >
            <tr class="color" >
              <td width="56%" align="center">
                  <input type="text" name="date_chemo_follow" id="date_chemo" 
                      size="10" value="<?php echo $date_chemo_follow; ?>" />
                    &nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500) 
              </td>
            </tr>
            <tr class="color" >
            <td align="left" >
               <table width="491" border="0" cellpadding="0" cellspacing="4" >
                    <tr bgcolor="#F4F4F4"  align="left">
                        <td width="30%" align="left">
                            <input name="chemo_select_follow" 
                                   id="chemo_select_follow1" 
                                   type="radio" value="Ch+/-P"  
                                   <?php if ($chemo_select_follow == 'Ch+/-P') {
                                       echo "checked";
                                    }?> >Ch+/-P
                        </td>
                        <td width="23%" align="left">
                            <input name="chemo_select_follow" 
                            id="chemo_select_follow2" 
                            type="radio" value="CP"  
                            <?php if ($chemo_select_follow == 'CP') {
                                        echo "checked";
                                    }?>>CP
                          </td>
                       <td width="23%" align="left">
                            <input name="chemo_select_follow" 
                                   id="chemo_select_follow3" 
                                   type="radio" value="CVP (COP)" 
                                   <?php if ($chemo_select_follow == 'CVP (COP)') {
                                          echo "checked";
                                      }
                                      ?> >CVP (COP)
                        </td>
                       <td width="24%" align="left">
                            <input name="chemo_select_follow" 
                                   id="chemo_select_follow4" 
                                   type="radio" 
                                   value="CHOP-14" 
                                   <?php if ($chemo_select_follow == 'CHOP-14') {
                                          echo "checked";
                                      }
                                      ?> />CHOP-14
                         </td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
                        <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="CHOP-21" 
                                    id="chemo_select_follow5" 
                                    <?php if ($chemo_select_follow == 'CHOP-21') {
                                        echo "checked";
                                    }
                                    ?>  /> CHOP-21
                        </td>
                       <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="CHOEP"  
                                    id="chemo_select_follow6" 
                                    <?php if ($chemo_select_follow == 'CHOEP') {
                                            echo "checked";
                                        }
                                        ?> />CHOEP
                        </td>
                       <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="CNOP"  
                                    id="chemo_select_follow7" 
                                    <?php if ($chemo_select_follow == 'CNOP') {
                                            echo "checked";
                                        }
                                        ?>>CNOP
                        </td>
                       <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="EPOCH" 
                                    id="chemo_select_follow8" 
                                    <?php if ($chemo_select_follow == 'EPOCH') {
                                            echo "checked";
                                        }
                                        ?> />EPOCH
                        </td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
                        <td>
                              <input name="chemo_select_follow" 
                                     type="radio" 
                                     value="CHOP-ESHAP" 
                                     id="chemo_select_follow9"  
                                     <?php if ($chemo_select_follow == 'CHOP-ESHAP') {
                                            echo "checked";
                                        }
                                        ?>/>CHOP-ESHAP
                        </td>
                        <td>
                              <input name="chemo_select_follow" 
                                     type="radio" 
                                     value="HyperCVAD" 
                                     id="chemo_select_follow10" 
                                     <?php if ($chemo_select_follow == 'HyperCVAD') {
                                            echo "checked";
                                        }
                                        ?> />HyperCVAD
                        </td>
                         <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="F" 
                                    id="chemo_select_follow11"  
                                    <?php if ($chemo_select_follow == 'F') {
                                            echo "checked";
                                        }
                                        ?> />F
                          </td>
                        <td>
                             <input name="chemo_select_follow" 
                                    type="radio" 
                                    value="FC"  
                                    id="chemo_select_follow12" 
                                    <?php if ($chemo_select_follow == 'FC') {
                                        echo "checked";
                                    }
                                    ?> />   FC
                        </td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
                        <td>
                               <input name="chemo_select_follow" 
                                      type="radio" 
                                      value="FN+/-D"  
                                      id="chemo_select_follow13" 
                                      <?php if ($chemo_select_follow == 'FN+/-D') {
                                      echo "checked";
                                  }
                                  ?> />  FN+/-D
                        </td>
                        <td>
                                <input name="chemo_select_follow" 
                                       type="radio" 
                                       value="FCM" 
                                       id="chemo_select_follow14" 
                                       <?php if ($chemo_select_follow == 'FCM') {
                                          echo "checked";
                                      }
                                      ?>  />      FCM
                        </td>
                       <td>
                                <input name="chemo_select_follow" 
                                       type="radio" 
                                       value="COPP"  
                                       id="chemo_select_follow15" 
                                       <?php if ($chemo_select_follow == 'COPP') {
                                            echo "checked";
                                        }
                                        ?> />    COPP
                        </td>
                      <td>
                                 <input name="chemo_select_follow" 
                                        type="radio" 
                                        value="ABV" 
                                        id="chemo_select_follow16" 
                                        <?php if ($chemo_select_follow == 'ABV') {
                                        echo "checked";
                                    }
                                    ?> />       ABV
                      </td>
            </tr>

            <tr bgcolor="#F4F4F4"  align="left">
                       <td>
                                  <input name="chemo_select_follow" 
                                         type="radio" 
                                         value="COPP-ABV" 
                                         id="chemo_select_follow17" 
                                         <?php if ($chemo_select_follow == 'COPP-ABV') {
                                          echo "checked";
                                      }
                                      ?> />   COPP-ABV
                        </td>
                        <td>
                                  <input name="chemo_select_follow" 
                                         type="radio" 
                                         value="ABVD" 
                                         id="chemo_select_follow18" 
                                         <?php if ($chemo_select_follow == 'ABVD') {
                                            echo "checked";
                                        }
                                        ?> />          ABVD
                        </td>
                        <td>
                                  <input name="chemo_select_follow" 
                                         type="radio" 
                                         value="BEACOP" 
                                         id="chemo_select_follow19" 
                                         <?php if ($chemo_select_follow == 'BEACOP') {
                                            echo "checked";
                                        }
                                        ?> />      BEACOPP
                        </td>
                        <td align="left">
                                   <input name="chemo_select_follow" 
                                          type="radio" 
                                          id="chemo_select_follow20" 
                                          value="CODOX-M"   
                                          <?php if ($chemo_select_follow == 'CODOX-M') {
                                            echo "checked";
                                        }
                                        ?> />   CODOX-M
                        </td>
            </tr>
            <tr bgcolor="#F4F4F4"  align="left">
                        <td align="left">
                                    <input name="chemo_select_follow" 
                                           type="radio" 
                                           id="chemo_select_follow21" 
                                           value="CODOX-M/IVAC"  
                                           <?php if ($chemo_select_follow == "CODOX-M/IVAC") {
                                            echo "checked";
                                        }
                                        ?> />           CODOX-M/IVAC
                        </td>
                        <td align="left">
                                     <input name="chemo_select_follow" 
                                            type="radio" 
                                            id="chemo_select_follow22" 
                                            value="ALL regimen"   
                                            <?php if ($chemo_select_follow == 'ALL regimen') {
                                                echo "checked";
                                            }
                                            ?> />            ALL regimen
                        </td>
                        <td align="left">
                                     <input name="chemo_select_follow" 
                                            type="radio" 
                                            id="chemo_select_follow23" 
                                            value="Bendamustine"   
                                            <?php if ($chemo_select_follow == 'Bendamustine') {
                                            echo "checked";
                                        }
                                        ?> />            Bendamustine
                        </td>
                        <td align="left">
                                      <input name="chemo_select_follow" 
                                             type="radio" 
                                             id="chemo_select_follow24" 
                                             value="Ibrutinib"   
                                             <?php if ($chemo_select_follow == 'Ibrutinib') {
                                                echo "checked";
                                            }
                                            ?> />            Ibrutinib
                          </td>
            </tr>
            <tr bgcolor="#F4F4F4" >
                         <td align="left">
                                      <input name="chemo_select_follow" 
                                             id="chemo_select_follow25" 
                                             type="radio" value="Other"    
                                             <?php if ($chemo_select_follow == 'Other') {
                                                echo "checked";
                                            }
                                            ?> />    Other
                          </td>
                          <td colspan="3" align="left">
                                      <input name="chemo_select_follow_other" 
                                             id="chemo_select_follow_other" 
                                             type="text" 
                                             value="<?php
                                                if(trim($chemo_select_follow)=="Other"){
                                                echo $chemo_select_follow_other;} 
                                                    ?>" 
                                             size="20" />
                          </td>
            </tr>
            <tr bgcolor="#F4F4F4" >
                          <td align="left" colspan="4">Received Intrathecal chemotherapy    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input name="received_follow" 
                                             id="received_follow1"  
                                             type="radio" 
                                             value="Yes"  
                                             <?php if ($received_follow == 'Yes') {
                                                  echo "checked";
                                              }
                                              ?>>    Yes   &nbsp;&nbsp;&nbsp;&nbsp;
                                      <input name="received_follow" 
                                              id="received_follow2"  
                                              type="radio" 
                                              value="No"  
                                              <?php if ($received_follow == 'No') {
                                                  echo "checked";
                                              }
                                              ?>>    No
                          </td>
            </tr>
               </table>
            </td>
            </tr>
          </table>
          </div>
      </td>
    </tr>

    <!-- Immunotherapy -->

    <tr id="Immunotherapy" class="color" >
       <th> <font color="ff3333">    Immunotherapy </font>    </th>
         <td align="center">
           <input name="immunotherapy_follow"   
                  id="immunotherapy_follow_yes" 
                  type="radio" 
                  value="Immunotherapy"  
                  <?php if ($immunotherapy_follow == 'Immunotherapy') {
                    echo "checked='checked'";
                   } ?>   
            />  
               Yes &nbsp;&nbsp;&nbsp;
            <input name="immunotherapy_follow"  
                   id="immunotherapy_follow_no"  
                   type="radio" 
                   value="Immunotherapy_no"    
                   <?php if ($immunotherapy_follow == 'Immunotherapy_no') {
                    echo "checked='checked'";
                  } ?>  
             />  
                No

                <!-- Immunotherapy Sub -->
        <div id="immuno_follow_n2_yes">
            <table width="500" border="0" cellpadding="0" cellspacing="0" >
                  <!-- date -->
              <tr class="color" >
                <td align="center" >
                  <input type="text" 
                         name="date_immun_follow" 
                         id="date_immun_follow" 
                         size="10" 
                         value="<?php echo $date_immun_follow; ?>"  />&nbsp;&nbsp;&nbsp; (Example: 31-12-(พ.ศ.)2500)
                </td>
              </tr>

                <!-- Rituximab (Mabthara) -->
                <tr class="color" >
                  <td align="left" >
                    <input name="immun_select_follow" 
                           id="immun_select_follow1" 
                           type="radio" 
                           value="Rituximab(Mabthara)" 
                           <?php if ($immun_select_follow == "Rituximab(Mabthara)") {
                              echo "checked";
                          } ?>
                    />  Rituximab (Mabthara)
<?php echo (strlen(strstr($immun_other_text, "Rituximab(Mabthara)Induction")) > 0);?>
                       <!-- Rituximab (Mabthara) Sub -->
                            <div  id="immun_select_follow1_show" class="sublayer-2">
                                <table width="500" border="0" cellpadding="0" cellspacing="0" >
                                  <tr class="color" >
                                     <td>
                                       <input name="immun_select_follow_sub[z-index]" 
                                              id="rituximab_1" 
                                              type="checkbox"  
                                              value="Rituximab(Mabthara)Induction" 
                                              <?php if (strlen(strstr($immun_other_text, "Rituximab(Mabthara)Induction")) > 0) {
                                                echo "checked";
                                              }?> 
                                        />  Induction <br/><br/>
                                        cycle : <input input type="text"  /><br/>
                                       <input name="immun_select_follow_sub[z-index]"  
                                              id="rituximab_2" 
                                              type="checkbox"  
                                              value="Rituximab(Mabthara)Maintenance" 
                                              <?php if (strlen(strstr($immun_other_text, "Rituximab(Mabthara)Maintenance")) > 0) {
                                                  echo "checked";
                                              }?> 
                                        />  Maintenance <br/><br/>
                                      </td>
                                  </tr>
                                </table>
                              </div>
                  </td>
                </tr>


              <!-- Rituximab (Generic)  -->
              <tr class="color" >
                <td align="left" >

                <input name="immun_select_follow" 
                       id="immun_select_follow7" 
                       type="radio"
                        value="Rituximab(Generic)" 
                        <?php if ($immun_select_follow == "Rituximab(Generic)") {
                              echo "checked";
                          }?> 
                />  Rituximab (Generic)

                   <!-- Rituximab (Generic) Sub -->
                    <div  id="immun_select_follow7_show" class="sublayer-2">
                      <table width="500" border="0" cellpadding="0" cellspacing="0" >
                        <tr class="color" >
                          <td>
                          <input name="immun_select_follow_sub[z-index]" 
                                  id="rituximab_3" 
                                  type="checkbox"  
                                  value="Rituximab(Generic)Induction" 
                                  <?php if (strlen(strstr($immun_other_text, "Rituximab(Generic)Induction")) > 0) {
                                      echo "checked";
                                  }?> 
                          />  Induction 
                          <input name="immun_select_follow_sub[z-index]"  
                                id="rituximab_4" 
                                type="checkbox"  
                                value="Rituximab(Generic)Maintenance" <?php
                                    if (strlen(strstr($immun_other_text, "Rituximab(Generic)Maintenance")) > 0) {
                                        echo "checked";
                                    }?> 
                          />  Maintenance
                          </td>
                      </tr>
                    </table>
                  </div>
                            
                </td>
              </tr>

              <!-- Obinutuzumab -->
              <tr class="color" >
                <td align="left" >
                   <input name="immun_select_follow" 
                          id="immun_select_follow2" 
                          type="radio"  
                          value="Obinutuzumab" 
                          <?php if ($immun_select_follow == "Obinutuzumab") {
                                  echo "checked";
                              }
                              ?> 
                    />  Obinutuzumab
                </td>
              </tr>

              <!-- Brentuximab -->
              <tr class="color" >
                <td align="left" >
                 <input name="immun_select_follow"  
                        id="immun_select_follow3" 
                        type="radio"  
                        value="Brentuximab" 
                        <?php if ($immun_select_follow == "Brentuximab") {
                            echo "checked";
                        }?> 
                  />  Brentuximab
                </td>
              </tr>

              <!-- Ibritumomab  -->
              <tr class="color" >
                <td align="left" >
                  <input name="immun_select_follow" 
                         id="immun_select_follow4" 
                         type="radio" 
                         value="Ibritumomab" 
                         <?php if ($immun_select_follow == "Ibritumomab") {
                              echo "checked";
                          }
                          ?> 
                  /> Ibritumomab
                </td>
              </tr>

              <!-- Alemtuzumab -->
              <tr class="color" >
                <td align="left" >
                <input name="immun_select_follow" 
                       id="immun_select_follow5"  
                       type="radio" 
                       value="Alemtuzumab" 
                       <?php if ($immun_select_follow == "Alemtuzumab") {
                            echo "checked";
                        }
                        ?> 
                />  Alemtuzumab
                </td>
              </tr>

              <!-- Other -->
              <tr class="color" >
                <td align="left" >
                <input name="immun_select_follow" 
                id="immun_select_follow6"  
                type="radio" 
                value="Other" 
                <?php if ($immun_select_follow == "Other") {
                      echo "checked";
                  }
                  ?> 
                 />  Other
                  <!-- Other  Sub-->
                  <table id="table_specify" width="500" border="0" cellpadding="0" cellspacing="0">
                    <tr class="color" >
                      <td align="left" >
                        <strong>   specify  :</strong>  
                        <input name="immun_other_text" 
                               id="immun_other_text" 
                               type="text"  
                               value="<?php echo $immun_other_text; ?>"  
                               size="30"
                        /> 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            </table>
        </div>  
      </td>
    </tr>



   <!-- Radiotherapy -->
   <tr class="color" >
	 <th><font color="ff3333">  Radiotherapy </font></th>
   <td align="center" colspan="2">
     <input name="radiotherapy_follow" 
            id="radiotherapy_follow_yes" 
            onclick="check_getsave()" 
            type="radio" 
            value="Radiotherapy"  
            <?php if ($radiotherapy_follow == 'Radiotherapy') {
                echo "checked";
            }
            ?>
      />  Yes 
     <input name="radiotherapy_follow" 
            id="radiotherapy_follow_no" 
            onclick="check_getsave()"  
            type="radio" 
            value="Radiotherapy_no"  
            <?php if ($radiotherapy_follow == 'Radiotherapy_no') {
                  echo "checked";
              }
              ?>   
      />  No
       <!-- Radiotherapy Sub -->
      <div id="radio_follow_yes">
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F4F4F4" >
          <td align="center">
            <input type="text" 
                   name="date_rad_follow" 
                   id="date_rad_follow" 
                   size="10" 
                   value="<?php echo $date_rad_follow; ?>"  />  (Example: 31-12-(พ.ศ.)2500)
          </td>
        </tr>
      </table>
    </div>
</td>
</tr>

   <!-- Surgery -->


 <tr class="color" >
 <th><font color="ff3333">Surgery </font></th>
 <td align="center" >
   <input type="radio" 
          name="surgery_follow" 
          onclick="check_getsave()"  
          id="surgery_follow_yes"  
          value="yes"  <?php if ($surgery_follow == "yes") {
              echo "checked";
          }?>
    />  Yes

  <input name="surgery_follow"   
         onclick="check_getsave()"  
         id="surgery_follow_no" 
         type="radio" 
         value="no"     
         <?php if ($surgery_follow == "no") {
            echo "checked";
          }?>  
   /> No
    
  <div id="surgery_follow_detail" >
   <table width="300" border="0" cellpadding="0" cellspacing="0">
    <tr bgcolor="#F4F4F4" >
     <td align="center" colspan="2"> <br />
       <input type="text" 
               name="date_surgery_follow" 
               id="date_surgery_follow" 
               size="10" 
               value="<?php echo $date_surgery_follow; ?>"  
         />(Example: 31-12-(พ.ศ.)2500)
     </td>
    </tr>
   </table>
 </div>
</td>
</tr>
  
   <!-- No (including observation) -->
  <tr class="color" >
    <th align="center" >
      <font color="ff3333"> No (including observation)</font>
    </th>
    <td align="center">
       <input name="no_treatment_follow" 
              onClick="check_getsave1()"   
              id="no_treatment_follow" 
              type="checkbox" 
              value="No (including observation)"  
              <?php if ($no_treatment_follow == 'No (including observation)') {
              echo "checked";
              }
              ?> />   No (including observation)
   </td>
</tr>


           <!-- Result of Initial Treatment  -->
  <tr class="color" >
    <th align="left" colspan="2"><h4> Clinical Outcome </h4></th>
  </tr>
  <tr class="color" >
    <th colspan="2" align="left">
      Result of Initial Treatment
    </th>
  </tr>

  <!-- Complete response (CR) -->
  <tr class="color" >
  <td></td>
 <td align="left">
   <input name="result_follow" 
          type="radio" 
          id="result_follow1"  
          value="Complete response (CR)" 
                  <?php if ($result_follow == "Complete response (CR)") {
            echo "checked";
        }?>  
    /> Complete response (CR)  <br /><br />

  <div id="result_follow_cr_complete">
   <table width="500" border="0" cellpadding="0" cellspacing="0" >
    <tr bgcolor="#F4F4F4" >
      <td>
        Date of Document CR/CRu   &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" 
               name="date_cr_complete_follow" 
               id="date_cr_complete_follow" 
               size="10" 
               value="<?php echo $date_complete_follow; ?>" 
         /> (Example: 31-12-(พ.ศ.)2500) <br /><br />
      </td>
    </tr>
  </table>
</div>

<!-- Complete response (uncomfirmed) (CRu) -->

<input name="result_follow" 
       type="radio" 
       id="result_follow2"  
       value="Complete response (uncomfirmed) (CRu)"<?php if ($result_follow == "Complete response (uncomfirmed) (CRu)") {
    echo "checked";
}
?>  onclick="onaction();"  /> Complete response (uncomfirmed) (CRu) <br /><br />

<div id="result_follow_no_complete"></div>
<div id="result_follow_complete">
 <table width="500" border="0" cellpadding="0" cellspacing="0" >
  <tr bgcolor="#F4F4F4" >
    <td>
      Date of Document CR/CRu
      <input type="text" 
             name="date_complete_follow" 
             id="date_complete_follow" 
             size="10" value="<?php echo $date_complete_follow; ?>"  
      />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500)
    </td>
  </tr>
</table>
</div>

<!-- Partial response (PR) -->
<input name="result_follow" 
       type="radio" 
       value="Partial response (PR)" 
       id="result_follow3"  
              <?php if ($result_follow == 'Partial response (PR)') {
            echo "checked";
        }?>  
/>            Partial response (PR) <br /><br />

<!-- Stable disease (SD) -->

<input name="result_follow" 
       type="radio" 
       value="Stable disease (SD)" 
       id="result_follow4" 
              <?php if ($result_follow == 'Stable disease (SD)') {
            echo "checked";
        }?>  
/>             Stable disease (SD) <br /><br />

<!-- Progressive disease (PD) -->

<input name="result_follow" 
       type="radio" 
       value="Progressive disease (PD)" 
       id="result_follow5"  
       <?php if ($result_follow == 'Progressive disease (PD)') {
            echo "checked";
        }?>  
/>
Progressive disease (PD) <br /><br />

<!-- Indeterminate (ID) -->

<input name="result_follow" 
       type="radio" 
       value="Indeterminate (ID)" 
       id="result_follow6" 
          <?php if ($result_follow == "Indeterminate (ID)") {
        echo "checked";
       $resu_foll=$result_follow;
    }?>  
/>
<input  type="hidden" 
        id="ch_in_id"  
        value="<?=$resu_foll?>"
>
Indeterminate (ID)<br /><br />
<div   id='cause'>
  <b>  Cause    </b>        &nbsp;&nbsp;&nbsp;
  <input name="result_cause_follow" 
         id="result_cause_follow1" 
         type="radio" 
         value="Death"  
         <?php if ($result_cause_follow == 'Death') {
    echo "checked";
}
?>> Death
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="result_cause_follow" 
         id="result_cause_follow2" 
         type="radio" 
         value="Loss to follow up" 
                <?php if ($result_cause_follow == 'Loss to follow up') {
            echo "checked";
        }?>
> Loss to follow up
</div>

</td>
</tr>

                  <!-- Follow Up -->
<tr bgcolor="#F4F4F4" >
  <th align="left" colspan="2">      <font size="+2" color="#0000FF">          Follow Up                   </font> </th>
</tr>

<!-- Progression/relapse -->
<tr bgcolor="#F4F4F4" >
  <th align="left"><br />
   <font color="#0000FF">  Progression/relapse  </font>       &nbsp;&nbsp; &nbsp;&nbsp;
 </th>

<td><br />
   <input name="progression_follow" 
          type="radio" 
          value="Yes"  
          <?php if ($progression_follow == 'Yes') {
              echo "checked";
           }?> 
           id="progression_follow_yes"  
           onclick="onaction();"  
  />      Yes &nbsp;&nbsp;&nbsp;

  <input name="progression_follow" 
         type="radio" 
         value="No"   
         <?php if ($progression_follow == 'No') {
              echo "checked";
          }?> 
         id="progression_follow_no"  
         onclick="onaction();"  
  />  No<br /><br />

  <div id="sub_progression_follow_yes">
    <input type="text" 
           name="date_progression_follow" 
           id="date_progression_follow" 
           size="10" 
           value="<?php echo $date_progression_follow; ?>"  
    />&nbsp;&nbsp;&nbsp; (Example: 31-12-(พ.ศ.)2500)  <br /><br />
   
    Histology tranformation
    <input name="histology_follow" 
           id="histology_follow1" 
           type="radio" 
           value="Yes" <?php if ($histology_follow == 'Yes') {
              echo "checked";
          }?>
    >  Yes    &nbsp;&nbsp;&nbsp;

    <input name="histology_follow"  
           id="histology_follow2" 
           type="radio" 
           value="No" 
           <?php if ($histology_follow == 'No') {
                echo "checked";
            }?>
    > No &nbsp;&nbsp;&nbsp;

    <input name="histology_follow"  
           id="histology_follow3" 
           type="radio" 
           value="Unknown" <?php if ($histology_follow == 'Unknown') {
                echo "checked";
            }?>
    > Unknown
    <br /><br />

    <b>   Progression/relapse sites (mark all that apply) </b> <br /><br />

    <input name="lymphnode_follow" 
           id="lymphnode_follow" 
           type="checkbox"  
           value="Lymph node"  
           <?php if ($lymphnode_follow == 'Lymph node') {
                echo "checked";
            }?>
    >         Lymph node   <br /><br />

    <input type="checkbox" 
           name="extranodal_follow" 
           id="extranodal_follow" 
           value="Extranodal sites" 
           <?php if ($extranodal_follow == 'Extranodal sites') {
                  echo "checked";
              }?>    
    >
    Extranodal sites (mark all that apply)   <br /><br />

    <!-- Extranodal sites (mark all that apply)  -->

<table width="500" border="0" cellpadding="0" cellspacing="0"  >
  <tr bgcolor="#F4F4F4"  align="left">
      <td width="128">
        <input type="checkbox" 
               name="extr_1_follow"  
               id="extr_1_follow" 
               value="Waldeyer's ring" <?php if ($extr_1_follow == "Waldeyer's ring") {
                    echo "checked";
                }?> 
        />           Waldeyer's ring
      </td>
        
      <td width="96">
        <input type="checkbox" 
               name="extr_2_follow"  
               id="extr_2_follow"  
               value="Sinonasal" <?php if ($extr_2_follow == "Sinonasal") {
                    echo "checked";
                }?> 
        />            Sinonasal
      </td>

      <td width="99">
          <input type="checkbox" 
                 name="extr_3_follow" 
                 id="extr_3_follow" 
                 value="Salivary gland"<?php if ($extr_3_follow == 'Salivary gland') {
                      echo "checked";
                  }?> 
           />     Salivary gland
      </td>

      <td width="77">
          <input type="checkbox" 
                 name="extr_4_follow" 
                 id="extr_4_follow" 
                 value="Thyroid"<?php if ($extr_4_follow == 'Thyroid') {
                      echo "checked";
                  }?> 
          />Thyroid
      </td>

    </tr>

    <tr bgcolor="#F4F4F4"  align="left">

      <td>
           <input type="checkbox" 
                  name="extr_5_follow" 
                  id="extr_5_follow" 
                  value="Eye/Ocular adnexa"<?php if ($extr_5_follow == 'Eye/Ocular adnexa') {
                      echo "checked";
                  }?> 
           />Eye/Ocular adnexa
      </td>

      <td>
            <input type="checkbox" 
                   name="extr_6_follow" 
                   id="extr_6_follow" 
                   value="Lung/Pleura"<?php if ($extr_6_follow == 'Lung/Pleura') {
                        echo "checked";
                    }?> 
            />Lung/Pleura
      </td>

      <td>
            <input type="checkbox" 
                   name="extr_7_follow" 
                   id="extr_7_follow" 
                   value="Breast" <?php if ($extr_7_follow == 'Breast') {
                      echo "checked";
                  }?> 
             />         Breast
      </td>

      <td>
            <input type="checkbox" 
                   name="extr_8_follow" 
                   id="extr_8_follow" 
                   value="Stomach" <?php if ($extr_8_follow == 'Stomach') {
                        echo "checked";
                    }?> 
            />            Stomach
      </td>
    </tr>

    <tr bgcolor="#F4F4F4"  align="left">
      <td>
             <input type="checkbox" 
                    name="extr_9_follow" 
                    id="extr_9_follow"  
                    value="Small intestine" <?php if ($extr_9_follow == 'Small intestine') {
                        echo "checked";
                    }?> 
              />            Small intestine
      </td>

      <td>
              <input type="checkbox" 
                     name="extr_10_follow" 
                     id="extr_10_follow" 
                     value="Testis"<?php if ($extr_10_follow == 'Testis') {
                          echo "checked";
                      }?> 
              />            Testis
      </td>

      <td>
               <input type="checkbox" 
                      name="extr_11_follow" 
                      id="extr_11_follow" 
                      value="Brain/CNS"<?php if ($extr_11_follow == 'Brain/CNS') {
                          echo "checked";
                      }?> 
                />         Brain/CNS
      </td>

      <td>
                <input type="checkbox" 
                       name="extr_12_follow" 
                       id="extr_12_follow" 
                       value="Liver" <?php if ($extr_12_follow == 'Liver') {
                            echo "checked";
                        }?> 
                />           Liver
      </td>

    </tr>

    <tr bgcolor="#F4F4F4"  align="left">
       <td>
                  <input type="checkbox" 
                         name="extr_13_follow" 
                         id="extr_13_follow" 
                         value="Large intestine"<?php if ($extr_13_follow == 'Large intestine') {
                              echo "checked";
                          }?>
                  />           Large intestine
        </td>

        <td>
                   <input type="checkbox" 
                          name="extr_14_follow" 
                          id="extr_14_follow" 
                          value="Bone" <?php if ($extr_14_follow == 'Bone') {
                              echo "checked";
                          }?> 
                    />            Bone
        </td>

        <td>
                    <input type="checkbox" 
                           name="extr_15_follow" 
                           id="extr_15_follow" 
                           value="Bone marrow"  <?php if ($extr_15_follow == 'Bone marrow') {
                              echo "checked";
                          }?> 
                    />            Bone marrow
        </td>

        <td>
                     <input type="checkbox" 
                            name="extr_16_follow" 
                            id="extr_16_follow" 
                            value="Spleen" <?php if ($extr_16_follow == 'Spleen') {
                                echo "checked";
                            }?> 
                      />          Spleen
        </td>
    </tr>

    <tr bgcolor="#F4F4F4"  align="left">
         <td>
                    <input type="checkbox" 
                            name="extr_17_follow" 
                            id="extr_17_follow" 
                            value="Skin/Subcutaneous"<?php if ($extr_17_follow == 'Skin/Subcutaneous') {
                                echo "checked";
                            }?> 
                    />        Skin/Subcutaneous
          </td>

        <td colspan="3">&nbsp;</td>
    </tr>

      
    <tr bgcolor="#F4F4F4"  align="left">
        <td colspan="4">
           <table width="400" border="0" cellpadding="0" cellspacing="0" >
            <tr bgcolor="#F4F4F4" >
              <td width="60" valign="top">
                     <input type="checkbox" 
                            name="extr_other" 
                            id="extr_other" 
                            value="other"  <?php if ($extr_other == 'other') {
                                echo "checked";
                            }?> 
                      />  Others
               </td>

               <td>
                   <textarea name="extr_other_text" cols="40" rows="4"  id="extr_other_text"><?php 
			                 if(trim($extr_other )!=""){
			                  echo $extr_other_text; }?></textarea></td>
             </tr>

            </table>
          </td>
     </tr>
    </table>

   </div>


</td>
</tr>

<!-- Salvage treatment Salvage regimen (mark all that apply) -->

<tr bgcolor="#F4F4F4" >
  <th align="left" >
    <strong><font color="#990033" size="+1">Salvage treatment </font><span style="padding-left:25px;">        <br /> <font color="#990033">  Salvage regimen (mark all that apply)          </font>
  </th>
  <td>

      <!-- Yes no -->

  <input name="salvage_follow" 
         type="radio" 
         value="Yes" <?php if ($salvage_follow == "Yes") {
              echo "checked";
          }?>  
         id="salvage_follow_yes"  
         onclick="onaction();"  
  /> Yes  &nbsp;&nbsp;&nbsp;

  <input name="salvage_follow" 
         type="radio" 
         value="No" <?php if ($salvage_follow == "No") {
            echo " checked";
        }?> 
         id="salvage_follow_no"   
         onclick="onaction();"  
  /> No<br /><br />
    
   <!-- Salvage treatment Salvage regimen (mark all that apply) SUB -->

   <div id="salvage_follow_detail">
          <font color="#990033">    <b>   Chemotherapy   </b>  </font> <br /><br />

       <input name="chemo_follow_1" 
              type="checkbox" 
              value="DHAP" 
              id="chemo_follow_1" <?php if ($chemo_follow_1 == "DHAP") {
                  echo "checked";
              }?> 
        />   DHAP  &nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_2" 
               type="checkbox" 
               value="ESHAP" 
               id="chemo_follow_2" <?php if ($chemo_follow_2 == "ESHAP") {
                   echo "checked";
                }?> 
        />  ESHAP &nbsp;

        <input name="chemo_follow_3" 
               type="checkbox"  
               value="MINE" 
               id="chemo_follow_3" <?php if ($chemo_follow_3 == 'MINE') {
                    echo "checked";
                }?>
        >MINE  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_4" 
               type="checkbox"  
               value="IMVP-16"
               id="chemo_follow_4" <?php if ($chemo_follow_4 == 'IMVP-16') {
                    echo "checked";
                }?>
        >  IMVP-16  &nbsp;&nbsp;

        <input name="chemo_follow_5" 
               type="checkbox"  
               value="ICE" 
               id="chemo_follow_5"<?php if ($chemo_follow_5 == 'ICE') {
                    echo "checked";
                }?>
        >ICE  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_6" 
               type="checkbox" 
               value="Gemcitabine-regimen" 
               id="chemo_follow_6"<?php if ($chemo_follow_6 == 'Gemcitabine-regimen') {
                    echo "checked";
                }?>
        >Gemcitabine-regimen  <br /><br />

        <input name="chemo_follow_7" 
               type="checkbox"  
               value="Ch+/-P"
               id="chemo_follow_7"<?php if ($chemo_follow_7 == 'Ch+/-P') {
                    echo "checked";
                }?>
        >Ch+/-P  &nbsp;&nbsp;

        <input name="chemo_follow_8" 
               type="checkbox" 
               value="CP" 
               id="chemo_follow_8"<?php if ($chemo_follow_8 == 'CP') {
                  echo "checked";
              }?>
        >CP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_9" 
               type="checkbox" 
               value="CVP (COP)" 
               id="chemo_follow_9"<?php if ($chemo_follow_9 == 'CVP (COP)') {
                  echo "checked";
              }?>
        >CVP (COP) &nbsp;&nbsp;

        <input name="chemo_follow_10" 
               type="checkbox"
               value="CHOP-14"
               id="chemo_follow_10"<?php if ($chemo_follow_10 == 'CHOP-14') {
                  echo "checked";
              }?>
        > CHOP-14&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_11" 
               type="checkbox" 
               value="CHOP-21" 
               id="chemo_follow_11"<?php if ($chemo_follow_11 == 'CHOP-21') {
                    echo "checked";
                }?>
        >CHOP-21&nbsp;

        <input name="chemo_follow_12" 
               type="checkbox"  
               value="CHOEP" 
               id="chemo_follow_12"<?php if ($chemo_follow_12 == 'CHOEP') {
                    echo "checked";
                }?>
        >CHOEP  <br /><Br />

        <input name="chemo_follow_13" 
               type="checkbox" 
               value="CNOP" 
               id="chemo_follow_13"<?php if ($chemo_follow_13 == 'CNOP') {
                    echo "checked";
                }?>
        > CNOP  &nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_14" 
               type="checkbox" 
               value="EPOCH" 
               id="chemo_follow_14"<?php if ($chemo_follow_14 == 'EPOCH') {
                    echo "checked";
                }?>
        >EPOCH  &nbsp;

        <input name="chemo_follow_15" 
               type="checkbox"  
               value="CHOP-ESHAP" 
               id="chemo_follow_15"<?php if ($chemo_follow_15 == 'CHOP-ESHAP') {
                    echo "checked";
                }?>
        >CHOP-ESHAP

        <input name="chemo_follow_16" 
               type="checkbox" 
               value="HyperCVAD" 
               id="chemo_follow_16"<?php if ($chemo_follow_16 == 'HyperCVAD') {
                    echo "checked";
                }?>
        > HyperCVAD

        <input name="chemo_follow_17" 
               type="checkbox"  
               value="F" 
               id="chemo_follow_17"<?php if ($chemo_follow_17 == 'F') {
                    echo "checked";
                }?>
         >F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_18" 
               type="checkbox" 
               value="FC" 
               id="chemo_follow_18"<?php if ($chemo_follow_18 == 'FC') {
                    echo "checked";
                }?>
         >FC  <br /><br />

        <input name="chemo_follow_19" 
               type="checkbox"  
               value="FN+/-D" 
               id="chemo_follow_19"<?php if ($chemo_follow_19 == 'FN+/-D') {
                    echo "checked";
                }?>
        >FN+/-D  &nbsp;&nbsp;

        <input name="chemo_follow_20" 
               type="checkbox"
               value="FCM" 
               id="chemo_follow_20"<?php if ($chemo_follow_20 == 'FCM') {
                    echo "checked";
                }?>
        > FCM &nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_21" 
               type="checkbox" 
               value="COPP"
               id="chemo_follow_21" <?php if ($chemo_follow_21 == 'COPP') {
                    echo "checked";
                }?>
        >COPP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_22" 
               type="checkbox" 
               value="ABV"
               id="chemo_follow_22"<?php if ($chemo_follow_22 == 'ABV') {
                    echo "checked";
                }?>
        >ABV  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input name="chemo_follow_23" 
               type="checkbox" 
               value="COPP-ABV" 
               id="chemo_follow_23"<?php if ($chemo_follow_23 == 'COPP-ABV') {
                    echo "checked";
                }?>
        >COPP-ABV

        <input name="chemo_follow_24" 
               type="checkbox" 
               value="ABVD" 
               id="chemo_follow_24"<?php if ($chemo_follow_24 == 'ABVD') {
                    echo "checked";
                }?>
        > ABVD  <br /><br />

        <input name="chemo_follow_25" 
               type="checkbox" 
               value="BEACOPP" 
               id="chemo_follow_25"<?php if ($chemo_follow_25 == 'BEACOPP') {
                    echo "checked";
                }?>
        >BEACOPP

        <input name="chemo_follow_26" 
               type="checkbox"  
               value="CODOX-M" 
               id="chemo_follow_26"<?php if ($chemo_follow_26 == 'CODOX-M') {
                    echo "checked";
                }?>
        >CODOX-M

        <input name="chemo_follow_27" 
               type="checkbox"  
               value="CODOX-M/IVAC"
               id="chemo_follow_27"<?php if ($chemo_follow_27 == 'CODOX-M/IVAC') {
                    echo "checked";
                }?>
        >CODOX-M/IVAC

        <input name="chemo_follow_28" 
               type="checkbox" 
               value="ABVD" 
               id="chemo_follow_28"<?php if ($chemo_follow_28 == 'ABVD') {
                    echo "checked";
                }?>
        >ALL regimen  <br /><br />

        <input name="chemo_follow_28_1" 
               type="checkbox" 
               value="Bendamustine" 
               id="chemo_follow_28_1"<?php if ($chemo_follow_28_1 == 'Bendamustine') {
                    echo "checked";
                }?>
        >Bendamustine

        <input name="chemo_follow_28_2" 
               type="checkbox" 
               value="Ibrutinib" 
               id="chemo_follow_28_2"<?php if ($chemo_follow_28_2 == 'Ibrutinib') {
                    echo "checked";
                }?>
        >Ibrutinib <br /><br />

        <input name="chemo_follow_29" 
               type="checkbox"  
               value="Other" 
               id="chemo_follow_29"<?php if ($chemo_follow_29 == 'Other') {
                    echo "checked";
                }?>
        >Others<br />

        <textarea name="chemo_other_follow_29" 
                  cols="40" 
                  rows="4"  
                  id="chemo_other_follow_29" >
                  <?php 
                      if(trim($chemo_follow_29 )!=""){
                      echo $chemo_other_follow_29;} 
                  ?>
         </textarea> <br />
      
          **  Please input ( , comma) in text.<br>

          <br /><br />

        <b><font color="#990033"> Immunotherapy</font></b> &nbsp;&nbsp;

        <input name="immunotherapy_follow1" 
               type="radio" 
               value="Yes"<?php $imf1 =  0;
                    if ($immunotherapy_follow1 == 'Yes') {
                    $imf1=1;
                    echo "checked";
                    }?> 
              id="sub_immunotherapy_follow_yes"    
        />Yes  &nbsp;&nbsp;&nbsp;

        <input name="immunotherapy_follow1" 
               type="radio" 
               value="No"<?php if ($immunotherapy_follow1 == 'No') {
                  $imf1=2;
                echo "checked";
               }?> 
               id="sub_immunotherapy_follow_no"   
        />No</span></strong>  <br /><br />
         
     <div id="sub_immunotherapy_detail">
        <input name="sal_immun_1" 
               id="sal_immun_1" 
               type="checkbox" 
               value="Rituximab"  <?php if ($sal_immun_1 == 'Rituximab' && $imf1==1) {
                      echo "checked";
                  }?> 
        />          Rituximab  &nbsp;&nbsp;

        <input name="sal_immun_2" 
               id="sal_immun_2" 
               type="checkbox" 
               value="Ibritumomab" <?php if ($sal_immun_2 == 'Ibritumomab'   && $imf1==1) {
                        echo "checked";
                    }?>  
        />          Ibritumomab  &nbsp;&nbsp;

        <input name="sal_immun_3" 
               id="sal_immun_3" 
               type="checkbox" 
               value="Alemtuzumab" <?php if ($sal_immun_3 == 'Alemtuzumab'  &&  $imf1==1) {
                      echo "checked";
                  }?> 
        />          Alemtuzumab  &nbsp;&nbsp;

        <input name="sal_immun_3_1" 
               id="sal_immun_3_1" 
               type="checkbox" 
               value="Obinutuzumab" <?php if ($sal_immun_3_1 == 'Obinutuzumab'  &&  $imf1==1) {
                      echo "checked";
                  }?>  
        />    Obinutuzumab &nbsp;&nbsp; <br>
        
        <input name="sal_immun_3_2" 
               id="sal_immun_3_2" 
               type="checkbox" 
               value="Brentuximab" <?php if ($sal_immun_3_2 == 'Brentuximab'  &&  $imf1==1) {
                        echo "checked";
                    }?>  
        />    Brentuximab &nbsp;&nbsp;
              <br /><Br />

        <input name="sal_immun_4" 
               id="sal_immun_4" 
               type="checkbox" 
               value="Other" <?php if ($sal_immun_4 == 'Other'  && $imf1==1) {
                          echo "checked";
                      }?>  
        />      Other :&nbsp;&nbsp;

        <input name="sal_immun_4_text" 
               id="sal_immun_4_text" 
               type="text" 
               size="20"  
               value="<?php 
                    if(trim($sal_immun_4)!=""){
                    echo $sal_immun_4_text; 
                    }?>">   <br /><br />
   </div>

        <input name="sal_radio_follow" 
               type="checkbox"  
               value="Radiotherapy" <?php if ($sal_radio_follow == 'Radiotherapy') {
                        echo "checked";
                    }?> 
               id="sal_radio_follow" 
        /> <b><font color="#990033"> Radiotherapy</font></b><br /><br />

        <input name="sal_surgery_follow" 
               type="checkbox"  
               value="Surgery" <?php if ($sal_surgery_follow == 'Surgery') {
                        echo "checked";
                    }?> 
               id="sal_surgery_follow" 
         /> <b><font color="#990033">      Surgery</font></b><br /><br />

      </td>
    </tr>

  </div>
  </td>
</tr>

<!-- Stem cell transplant : -->

<tr bgcolor="#F4F4F4" >
  <th align="left">Stem cell transplant  :</th>
  <td>      <br />
    <input name="stem_cell_follow"  
           id="stem_cell_follow_yes" 
           type="radio" 
           value="Yes" <?php if ($stem_cell_follow == 'Yes') {
                    echo "checked";
                }?>  
           onclick="onaction();"   
    />  Yes    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <input name="stem_cell_follow" 
           id="stem_cell_follow_no" 
           type="radio" 
           value="No"  <?php if ($stem_cell_follow == 'No') {
                echo "checked";
            }?>  
           onclick="onaction();"  
    />  No  <br /><br />

  <div id="stem_cell_follow_detail">
     <input type="text" 
            name="date_stem_cell_follow" 
            id="date_stem_cell_follow" 
            size="10" 
            value="<?php echo $date_stem_cell_follow; ?>"  
      />  &nbsp;&nbsp;&nbsp;  (Example: 31-12-(พ.ศ.)2500) &nbsp;&nbsp;&nbsp;&nbsp;
             <br /><br />

     <input name="stem_cell_method" 
            type="radio" 
            id="stem_cell_method_autologous" 
            value="Autologous" <?php if ($stem_cell_method == "Autologous") {
                    echo "checked";
                }?> 
      />        Autologous   <br /><br />

     <input name="stem_cell_method" 
            type="radio" 
            id="stem_cell_method_allogeneic" 
            value="Allogeneic" <?php if ($stem_cell_method == "Allogeneic") {
                  echo "checked";
              }?>   
      />        Allogeneic

    
    <div id="stem_cell_method_allogeneic_detail">
      <table width="500" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#F4F4F4" >
          <td>
           <strong>   Conditioning  </strong>  <br /><br />
           <input name="conditioning" 
                  type="radio" 
                  id="conditioning1" 
                  value="Myeloablative"<?php if ($conditioning == 'Myeloablative') {
                          echo "checked";
                      }?>
            />
          Myeloablative  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

         <input name="conditioning" 
                type="radio"  
                id="conditioning2" 
                value="Non-myeloablative" <?php if ($conditioning == 'Non-myeloablative') {
                          echo "checked";
                      }?>
          />
          Non-myeloablative             <br /><br />

          <b> Donor</b>  <br /><br />

         <input name="donor_follow" 
                type="radio"  
                id="donor_follow1" 
                value="HLA identical sibling" <?php if ($donor_follow == 'HLA identical sibling') {
                          echo "checked";
                      }?> 
          /> HLA identical sibling <br /><br />

          <input name="donor_follow" 
                 type="radio"  
                 id="donor_follow2" 
                 value=" Matched unrelated donor" <?php if ($donor_follow == ' Matched unrelated donor') {
                              echo "checked";
                          }?> 
          />  Matched unrelated donor  <br /><br />

          <input name="donor_follow" 
                 type="radio"  
                 id="donor_follow3" 
                 value="Haploidentical sibling" <?php if ($donor_follow == 'Haploidentical sibling') {
                            echo "checked";
                        }?> 
          > Haploidentical sibling  <br /><br />

          <input name="donor_follow" 
                 type="radio"  
                 id="donor_follow4" 
                 value="Other" <?php if ($donor == 'Other') {
                          echo "checked";
                      }?> 
          /> Other  <br /><br />

            <table width="500" border="0" cellpadding="0" cellspacing="0">
              <tr bgcolor="#F4F4F4" >
                <td>
                  <input type="text" name="donor_follow_other" id="donor_follow_other" value="<?php echo $donor_follow_other; ?>" size="50"  />
                </td>
              </tr>
            </table>

        </td>
      </tr>
    </table>
  </div>

  

</td>
</tr>

<!-- Date of last Contact : -->

<tr bgcolor="#F4F4F4" >
  <th align="left"><br />Date of last Contact :<br /><br /></th>
  <td align="left"><br />

    <input type="text" 
           name="date_last_contact_follow" 
           id="date_last_contact_follow" 
           size="10" value="<?php echo $date_last_contact_follow; ?>" 
           onKeyUp="onaction();"  
    />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500) <br /><br />

    <input name="status_follow" 
           type="radio" 
           value="Alive" 
           id="status_follow_alive"  <?php if ($status_follow == 'Alive') {
                    echo "checked";
                }?>  
           onclick="onaction();"   
    />   Alive

            <div id="alive">
              <table width="300" border="0" cellpadding="0" cellspacing="0" >
                <tr bgcolor="#F4F4F4" >
                  <td>
                  <input name="alive_status" 
                         id="alive_status1" 
                         type="radio" 
                         value="Remission"   <?php if ($alive_status == 'Remission') {
                                  echo "checked";
                              }?>  
                  />    Remission  &nbsp;&nbsp;&nbsp;

                  <input name="alive_status"  
                         id="alive_status2" 
                         type="radio" 
                         value="No remission"  <?php if ($alive_status == 'No remission') {
                                    echo "checked";
                                }?> 
                  />  No remission
                </td>
              </tr>
            </table>
          </div>
          <br /><br />

    <input name="status_follow" 
           type="radio" 
           value="Dead" 
           id="status_follow_dead" <?php if ($status_follow == 'Dead') {
                        echo "checked";
                    }?> 
            onClick="onaction();"  
    />  Dead
             

                  <!-- Dead Sub -->
                  <div id="dead">
                  <table width="500" border="0" cellpadding="0" cellspacing="0" >
                    <tr bgcolor="#F4F4F4" >
                      <td>
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr bgcolor="#F4F4F4" >
                            <td colspan="3" ><b>Date of death </b>
                              <input type="text" 
                                     name="date_dead_follow" 
                                     id="date_date_follow" 
                                     size="10" value="<?php echo $date_dead_follow; ?>"  
                              />&nbsp;&nbsp;&nbsp;    (Example: 31-12-(พ.ศ.)2500)
                            </td>
                          </tr>

                          <tr bgcolor="#F4F4F4" >
                            <td align="left" colspan="3" ><b>Cause of Death</b> </td>
                          </tr>
                          <tr bgcolor="#F4F4F4" >
                            <td width="33%" align="left" >
                              <input name="cause_of_dead" 
                                     id="cause_of_dead1" 
                                     type="radio" 
                                     value="Infection"<?php if ($cause_of_dead == 'Infection') {
                                              echo "checked";
                                          }?> 
                              />         Infection
                            </td>

                            <td width="33%" align="left">
                              <input name="cause_of_dead" 
                                     id="cause_of_dead2" 
                                     type="radio" 
                                     value="Progression"<?php if ($cause_of_dead == 'Progression') {
                                                  echo "checked";
                                              }?> 
                              />        Progression
                             </td>

                            <td align="left">
                              <input name="cause_of_dead" 
                                     id="cause_of_dead3" 
                                     type="radio" 
                                     value="Hemorrhage"<?php if ($cause_of_dead == 'Hemorrhage') {
                                                  echo "checked";
                                              }?>
                              />           Hemorrhage
                            </td>
                              </tr>

                              <tr bgcolor="#F4F4F4" >
                                <td colspan="3"  align="left">
                                  <table width="400" border="0" cellpadding="0" cellspacing="0" >
                                    <tr bgcolor="#F4F4F4" >
                                      <td width="60" valign="top" align="left">
                                         <input name="cause_of_dead" 
                                                id="cause_of_dead4"  
                                                type="radio" 
                                                value="Other" <?php if ($cause_of_dead == 'Other') {
                                                      echo "checked";
                                                  }?>
                                          />    Other
                                      </td>
                                      <td>
                                          <input name="cause_of_dead_other" 
                                                 id="cause_of_dead_other" 
                                                 type="text"  
                                                 size="40" 
                                                 value="<?php 
                                                      echo $cause_of_dead_other; 
                                                       ?>" 
                                          />
                                      </td>
                                    </tr>
                                  </table>            
                                </td>
                              </tr>

                              <tr bgcolor="#F4F4F4" >
                                <td colspan="3"  align="left"><b>Lymphoma status at time of  death </b></td>
                              </tr>
                              <tr bgcolor="#F4F4F4" >
                                <td align="left">
                                  <input name="lymphoma_status" 
                                         id="lymphoma_status1" 
                                         type="radio" 
                                         value="Remission" <?php if ($lymphoma_status == 'Remission') {
                                                echo "checked";
                                            }?> 
                                  />            Remission
                                </td>
                                <td align="left">
                                  <input name="lymphoma_status" 
                                         id="lymphoma_status2" 
                                         type="radio" 
                                         value="No remission"<?php if ($lymphoma_status == 'No remission') {
                                                    echo "checked";
                                                }?> 
                                  />            No remission
                                </td>

                                <td  align="left">
                                  <input name="lymphoma_status"  
                                         id="lymphoma_status3" 
                                         type="radio" 
                                         value="Indeterminate" <?php if ($lymphoma_status == 'Indeterminate') {
                                                  echo "checked";
                                              }?> 
                                  />           Indeterminate
                                </td>
                              </tr>
                            </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                <br /><br />


          <input name="status_follow" 
                 type="radio" 
                 id="status_follow3" 
                 value="Loss to follow-up" <?php if ($status_follow == "Loss to follow-up") {
                          echo "checked";
                      }?> 
                 onClick="onaction();"  
          />    Loss to follow-up

          <div id="loss_contact"></div>
          <br /><br />

        </td>
      </tr>

<!-- Button -->

<tr bgcolor="#F4F4F4" >
        <th colspan="4" align="center">
          <br /><br />
          <input name="id" 
                 type="hidden" 
                 id="id" 
                 value="<?php echo $id; ?>"
          />
          <button  type="submit" 
                   id="save"   
                   value="save" 
                   style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;" 
           >Save
           </button>   &nbsp;&nbsp;&nbsp;&nbsp;

          <button  type="submit" 
                   id="drafts" 
                   name="drafts" 
                   value="Update Data"  
                   style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;" 
          >Save drafts
          </button>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <input name="Submit2" 
                 type="button" 
                 class="button" 
                 value="Cancel" 
                 onClick="window.history.back();" 
                 style="background-color:#7a5037;color:#FFFFFF;cursor:pointer;width:120px;">&nbsp;&nbsp;&nbsp;&nbsp;<br />
              <br>
<font color="red">
* กรณีทำการ Save ข้อมูลปกติจำเป็นจะต้องกรอกข้อมูลให้ครบทุกช่องค่ะ !  (ที่เป็นสีแดง)</font><br><br>
        </td>
      </tr>

 <!-- //////////////////////////// -->
</table>

</form>

<?php 

echo $chemotherapy_follow . '<br/>';
                echo $immunotherapy_follow . '<br/>';
                echo $radiotherapy_follow . '<br/>';
                echo $surgery_follow . '<br/>';
                echo $result_follow . '<br/>';

?>

<!-- Footer -->
<?php include "modules/index/footer.php";?>

