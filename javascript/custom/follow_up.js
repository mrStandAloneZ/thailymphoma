$(document).ready(function() {

  jQuery(document).ready(function($) {
		check_getsave();
	});

	
	 var myVar = setInterval(check_getsave, 3000);
	 function check_getsave(){

        chk=0;
		
		
		 var a1= $("#frm_check [name='chemotherapy_follow']:checked").val();
		 var a2= $("#frm_check [name='date_chemo_follow']").val();
		 var a3= $("#frm_check [name='chemo_select_follow']:checked").val();
		 var a4= $("#frm_check [name='chemo_select_follow_other']").val();
		 var a5= $("#frm_check [name='received_follow']:checked").val();

		 var b1= $("#frm_check [name='immunotherapy_follow']:checked").val();
		 var b2= $("#frm_check [name='date_immun_follow']").val();
		 var bb1= $("#frm_check [name='immun_select_follow']:checked").val();
		 var bb2= $("#frm_check [name='immun_select_follow_sub[z-index]']").map(function(){return $(this).val();}).get();
		  var b3= $("#frm_check [name='immun_other_text']").val();
		 

		 var d1= $("#frm_check [name='radiotherapy_follow']:checked").val();
		 var d2= $("#frm_check [name='date_rad_follow']").val();		 
		 
		 
		 var dd1= $("#frm_check [name='surgery_follow']:checked").val();
		 var dd2= $("#frm_check [name='date_surgery_follow']").val();		 
		 
		 /*
		 
		 		  var g1= $("#frm_check [name='salvage_follow']:checked").val();
		          var g2= $("#frm_check [name='date_surgery_follow']").val();		 
				  var g3= $("#frm_check [name='date_surgery_follow']").val();		
		 
		 */
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 var e1= $("#frm_check [name='no_treatment_follow']:checked").val();
		 
	   console.log(a1);
		
		if(e1==undefined ){
		
		       if(a1==undefined){chk++;}else{
			   
			   if(a1=="Chemotherapy"){
			   if(a2==""){chk++;}if(a5==undefined){chk++;}if(a3==undefined){chk++;}else{if(a3=="Other"){if(a4==""){chk++;}}}
			   }}
			   
			   if(b1==undefined){chk++;}else{
			   
			   if(b1=="Immunotherapy"){
			   if(b2==""){chk++;}if(bb1!=undefined){
			             if(bb1=="Rituximab"){if(bb2==""){chk++;}}
					     if(bb1=="Other"){  if(b3==""){chk++;}}
				    
			       }}
			       }
				   
				   
		
		           if(d1==undefined){chk++;}else{
			       if(d1=="Radiotherapy"){
				   if(d2==""){chk++;}
				   }}
			
			
				    if(dd1==undefined){chk++;}else{
			        if(dd1=="yes"){
				    if(dd2==""){chk++;}
				   }}
			
		}
		 

		 if(chk>=1){
	
		 var  save = document.getElementById("save");
		         save.style.cursor = "not-allowed";
		         save.style.opacity=0.65; 
		         save.style.backgroundColor = "#cccccc";
				 save.style.disabled=true;
          // $('#save').prop("disabled",true);
        
			   
         }else{
		 		 var  save = document.getElementById("save");
		         save.style.cursor = "pointer";
		         save.style.opacity=1; 
		         save.style.backgroundColor = "#7a5037";
				 save.style.disabled=false;
          // $('#save').prop(disabled , false);
  
		 
		 }
			      

	  
	  }
  

    // Chemotherapy
  
    // yes no
    if($('#chemotherapy_follow_yes').is(':checked')){
          $('#chemotherapy_follow_detail').show();
    }else{
          $('#chemotherapy_follow_detail').hide();
          clear_data_chemotherapy();
    }
    
    $('#chemotherapy_follow_yes').click(function(){
       $('#chemotherapy_follow_detail').show();
       $('#no_treatment_follow').prop('checked', false);
    });
    $('#chemotherapy_follow_no').click(function(){
        clear_data_chemotherapy();
        $('#chemotherapy_follow_detail').hide();
    });

    
    $('#chemo_select_follow25').click(function(){
      $('#chemo_select_follow_other').prop('disabled', false);
    });
  
    if($('#chemo_select_follow25').is(':checked')){
      $('#chemo_select_follow_other').prop('disabled', false);
  
    }else{
      $('#chemo_select_follow_other').val('');
      $('#chemo_select_follow_other').prop('disabled', true);
     
    }
  
    $('input[type=radio][name=chemo_select_follow]').change(function() {
            if($('#chemo_select_follow25').is(':checked')){
      $('#chemo_select_follow_other').prop('disabled', false);
  
    }else{
      $('#chemo_select_follow_other').val('');
      $('#chemo_select_follow_other').prop('disabled', true);
     
    }
    });
  
    
  
      function clear_data_chemotherapy(){
        $('#date_chemo').val('');
        $('#chemo_select_follow1').prop('checked', false);
        $('#chemo_select_follow2').prop('checked', false);
        $('#chemo_select_follow3').prop('checked', false);
        $('#chemo_select_follow4').prop('checked', false);
        $('#chemo_select_follow5').prop('checked', false);
        $('#chemo_select_follow6').prop('checked', false);
        $('#chemo_select_follow7').prop('checked', false);
        $('#chemo_select_follow8').prop('checked', false);
        $('#chemo_select_follow9').prop('checked', false);
        $('#chemo_select_follow10').prop('checked', false);
        $('#chemo_select_follow11').prop('checked', false);
        $('#chemo_select_follow12').prop('checked', false);
        $('#chemo_select_follow13').prop('checked', false);
        $('#chemo_select_follow14').prop('checked', false);
        $('#chemo_select_follow15').prop('checked', false);
        $('#chemo_select_follow16').prop('checked', false);
        $('#chemo_select_follow17').prop('checked', false);
        $('#chemo_select_follow18').prop('checked', false);
        $('#chemo_select_follow19').prop('checked', false);
        $('#chemo_select_follow20').prop('checked', false);
        $('#chemo_select_follow21').prop('checked', false);
        $('#chemo_select_follow22').prop('checked', false);
        $('#chemo_select_follow23').prop('checked', false);
        $('#chemo_select_follow24').prop('checked', false);
        $('#chemo_select_follow25').prop('checked', false);
        $('#chemo_select_follow_other').val('');
        $('#chemo_select_follow_other').prop('disabled', true);
        $('#received_follow1').prop('checked', false);
        $('#received_follow2').prop('checked', false);
      }
  
       
  
   // Immunotherapy
      // Immunotherapy yes no
      if($('#immunotherapy_follow_yes').is(':checked')){
          $('#immuno_follow_n2_yes').show();
      }else{
          $('#immuno_follow_n2_yes').hide();
      }
  
      $('#immunotherapy_follow_yes').click(function(){
        $('#immuno_follow_n2_yes').show();
        $('#no_treatment_follow').prop('checked', false);
      });
      $('#immunotherapy_follow_no').click(function(){
          clear_data_immuno();
          $('#immuno_follow_n2_yes').hide();
      });
  
      
  
  
      // Rituximab (Mabthara) yes no
      if($('#immun_select_follow1').is(':checked')){
          $('#immun_select_follow1_show').show();
        if ($("#rituximab_1").is(':checked')){
          $("#immun_select_follow_rituximab_mabthara_induction_cycle").show();
          }else{
          $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
          }
      }else{
          $('#immun_select_follow1_show').hide();
       }
     
  $('#rituximab_1').change(function () {
    if ($("#rituximab_1").is(':checked')) {
      $("#immun_select_follow_rituximab_mabthara_induction_cycle").show();
    } else {
      $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
      $("#immun_select_follow_rituximab_mabthara_induction_cycle #retuximab_1_1").val('');
    }
  });
  
  
      // Rituximab (Generic) yes no
      if($('#immun_select_follow7').is(':checked')){
          $('#immun_select_follow7_show').show();
      }else{
          $('#immun_select_follow7_show').hide();
      }
      
  
      $('input[type=radio][name=immun_select_follow]').change(function() {
            if($('#immun_select_follow1').is(':checked')){
               $('#immun_select_follow1_show').show();
               $('#immun_select_follow7_show').hide();
               $('#rituximab_3').prop('checked', false);
               $('#rituximab_4').prop('checked', false);
               $('#immun_other_text').val('');
               $('#immun_other_text').prop('disabled', true);
              $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
              $("#immun_select_follow_rituximab_mabthara_induction_cycle #retuximab_1_1").val('');
            }else if($('#immun_select_follow7').is(':checked')){
              $('#immun_select_follow7_show').show();
              $('#immun_select_follow1_show').hide();
              $('#rituximab_1').prop('checked', false);
              $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
              $("#immun_select_follow_rituximab_mabthara_induction_cycle #retuximab_1_1").val('');
              $('#rituximab_2').prop('checked', false);
              $('#immun_other_text').val('');
              $('#immun_other_text').prop('disabled', true);
            }else if($('#immun_select_follow6').is(':checked')){
              $('#immun_other_text').prop('disabled', false);
              $('#immun_select_follow1_show').hide();
              $('#immun_select_follow7_show').hide();
              $('#rituximab_1').prop('checked', false);
              $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
              $("#immun_select_follow_rituximab_mabthara_induction_cycle #retuximab_1_1").val('');
              $('#rituximab_2').prop('checked', false);
              $('#rituximab_3').prop('checked', false);
              $('#rituximab_4').prop('checked', false);
            }else{
              $('#immun_select_follow1_show').hide();
              $('#immun_select_follow7_show').hide();
              $('#rituximab_1').prop('checked', false);
              $("#immun_select_follow_rituximab_mabthara_induction_cycle").hide();
              $("#immun_select_follow_rituximab_mabthara_induction_cycle #retuximab_1_1").val('');
              $('#rituximab_2').prop('checked', false);
              $('#rituximab_3').prop('checked', false);
              $('#rituximab_4').prop('checked', false);
              $('#immun_other_text').val('');
              $('#immun_other_text').prop('disabled', true);
            }
  
    });

        // Other
        if($('#immun_select_follow6').is(':checked')){
          $('#immun_other_text').prop('disabled', false);
        }else{
          $('#immun_other_text').prop('disabled', true);
        }
  
      function clear_data_immuno(){
     $('#date_immun_follow').val('');
  
     $('input[type=radio][name=immun_select_follow]').prop('checked',false);
     $('#immun_select_follow7_show').hide();
     $('#immun_select_follow1_show').hide();
     $('#rituximab_1').prop('checked', false);
     $('#rituximab_2').prop('checked', false);
     $('#rituximab_3').prop('checked', false);
     $('#rituximab_4').prop('checked', false);
     
     $('#immun_other_text').val('');
     $('#immun_other_text').prop('disabled', true);
   }
       
       // Radiotherapy
       
      $('#radio_follow_no').hide();
      $('#radio_follow_yes').hide();
      if($('#radiotherapy_follow_yes').is(':checked')){
        $('#radio_follow_yes').show();
      }
  
    $('#radiotherapy_follow_yes').click(function(){
      clear_data_radio_follow_yes();
      $('#radio_follow_no').hide();
      $('#radio_follow_yes').show();
      $('#no_treatment_follow').prop('checked', false);
    });
  
    $('#radiotherapy_follow_no').click(function(){
      clear_data_radio_follow_yes();
      $('#radio_follow_yes').hide();
      $('#radio_follow_no').show();
    });
  
    function clear_data_radio_follow_yes(){
      $('#date_rad_follow').val('');
  
    }
      
       // Surgery
      
      $('#surgery_follow_no_detail').hide();
      $('#surgery_follow_detail').hide();
      if($('#surgery_follow_yes').is(':checked')){
        $('#surgery_follow_detail').show();
      }
  
     $('#surgery_follow_yes').click(function(){
      clear_data_surgery_follow();
      $('#surgery_follow_no_detail').hide();
      $('#surgery_follow_detail').show();
      $('#no_treatment_follow').prop('checked', false);
    });
  
     $('#surgery_follow_no').click(function(){
      clear_data_surgery_follow();
      $('#surgery_follow_detail').hide();
      $('#surgery_follow_no_detail').show();
    });
  
     function clear_data_surgery_follow(){
      $('#date_surgery_follow').val('');
  
    }
      

    //    No (including observation)

  
    if($('#no_treatment_follow').is(':checked')){
      clear_data_site();
      change_attr(true);
	 
    }else{
      change_attr(false);
	  
    }
  
  $('#no_treatment_follow').click(function(){
    if($('#no_treatment_follow').is(':checked')){
      
      clear_data_site();
      change_attr(true);
      $('#chemotherapy_follow_detail').hide();
      $('#chemotherapy_follow_no_detail').show();
      $('#radio_follow_yes').hide();
      $('#radio_follow_no').show();
      $('#surgery_follow_detail').hide();
      $('#surgery_follow_no_detail').show();
      $('#immuno_follow_n2_yes').hide();
      $('#immuno_follow_n1_no').show();
    }else{
       
      change_attr(false);
    }
  });
  function change_attr(status){
    //$('#chemotherapy_follow_no').prop('checked', status);
   // $('#immunotherapy_follow_no').prop('checked', status);
    //$('#radiotherapy_follow_no').prop('checked', status);
    //$('#surgery_follow_no').prop('checked', status);
    // $('#chemotherapy_follow_yes').attr("disabled", status);
    // $('#chemotherapy_follow_no').attr("disabled", status);
    // $('#immunotherapy_follow_yes').attr("disabled", status);
    // $('#immunotherapy_follow_no').attr("disabled", status);
    // $('#radiotherapy_follow_yes').attr("disabled", status);
    // $('#radiotherapy_follow_no').attr("disabled", status);
    // $('#surgery_follow_yes').attr("disabled", status);
    // $('#surgery_follow_no').attr("disabled", status);
    // $('#date_chemo').attr("disabled", status);
    // $('#chemo_select_follow1').attr("disabled", status);
    // $('#chemo_select_follow2').attr("disabled", status);
    // $('#chemo_select_follow3').attr("disabled", status);
    // $('#chemo_select_follow4').attr("disabled", status);
    // $('#chemo_select_follow5').attr("disabled", status);
    // $('#chemo_select_follow6').attr("disabled", status);
    // $('#chemo_select_follow7').attr("disabled", status);
    // $('#chemo_select_follow8').attr("disabled", status);
    // $('#chemo_select_follow9').attr("disabled", status);
    // $('#chemo_select_follow10').attr("disabled", status);
    // $('#chemo_select_follow11').attr("disabled", status);
    // $('#chemo_select_follow12').attr("disabled", status);
    // $('#chemo_select_follow13').attr("disabled", status);
    // $('#chemo_select_follow14').attr("disabled", status);
    // $('#chemo_select_follow15').attr("disabled", status);
    // $('#chemo_select_follow16').attr("disabled", status);
    // $('#chemo_select_follow17').attr("disabled", status);
    // $('#chemo_select_follow18').attr("disabled", status);
    // $('#chemo_select_follow19').attr("disabled", status);
    // $('#chemo_select_follow20').attr("disabled", status);
    // $('#chemo_select_follow21').attr("disabled", status);
    // $('#chemo_select_follow22').attr("disabled", status);
    // $('#chemo_select_follow23').attr("disabled", status);
    // $('#chemo_select_follow_other').attr("disabled", status);
    // $('#received_follow1').attr("disabled", status);
    // $('#received_follow2').attr("disabled", status);
    // $('#date_immun_follow').attr("disabled", status);
    // $('#immun_select_follow1').attr("disabled", status);
    // $('#immun_select_follow2').attr("disabled", status);
    // $('#immun_select_follow3').attr("disabled", status);
    // $('#immun_select_follow4').attr("disabled", status);
    // $('#immun_select_follow5').attr("disabled", status);
    // $('#immun_select_follow6').attr("disabled", status);
    // $('#rituximab_1').attr("disabled", status);
    // $('#rituximab_2').attr("disabled", status);
    // $('#immun_other_text').attr("disabled", status);
    // $('#date_rad_follow').attr("disabled", status);
    // $('#date_surgery_follow').attr("disabled", status);


  }

  function clear_data_site(){
    $('#chemotherapy_follow_yes').prop('checked', false);
    $('#chemotherapy_follow_no').prop('checked', false);
    $('#immunotherapy_follow_yes').prop('checked', false);
    $('#immunotherapy_follow_no').prop('checked', false);
    $('#radiotherapy_follow_yes').prop('checked', false);
    $('#radiotherapy_follow_no').prop('checked', false);
    $('#surgery_follow_yes').prop('checked', false);
    $('#surgery_follow_no').prop('checked', false);
    $('#date_chemo').val('');
    $('#chemo_select_follow1').prop('checked', false);
    $('#chemo_select_follow2').prop('checked', false);
    $('#chemo_select_follow3').prop('checked', false);
    $('#chemo_select_follow4').prop('checked', false);
    $('#chemo_select_follow5').prop('checked', false);
    $('#chemo_select_follow6').prop('checked', false);
    $('#chemo_select_follow7').prop('checked', false);
    $('#chemo_select_follow8').prop('checked', false);
    $('#chemo_select_follow9').prop('checked', false);
    $('#chemo_select_follow10').prop('checked', false);
    $('#chemo_select_follow11').prop('checked', false);
    $('#chemo_select_follow12').prop('checked', false);
    $('#chemo_select_follow13').prop('checked', false);
    $('#chemo_select_follow14').prop('checked', false);
    $('#chemo_select_follow15').prop('checked', false);
    $('#chemo_select_follow16').prop('checked', false);
    $('#chemo_select_follow17').prop('checked', false);
    $('#chemo_select_follow18').prop('checked', false);
    $('#chemo_select_follow19').prop('checked', false);
    $('#chemo_select_follow20').prop('checked', false);
    $('#chemo_select_follow21').prop('checked', false);
    $('#chemo_select_follow22').prop('checked', false);
    $('#chemo_select_follow23').prop('checked', false);
    $('#chemo_select_follow_other').val('');
    $('#received_follow1').prop('checked', false);
    $('#received_follow2').prop('checked', false);
    $('#date_immun_follow').val('');
    $('#immun_select_follow1').prop('checked', false);
    $('#immun_select_follow1_show').hide();
    $('#immun_select_follow2').prop('checked', false);
    $('#immun_select_follow3').prop('checked', false);
    $('#immun_select_follow4').prop('checked', false);
    $('#immun_select_follow5').prop('checked', false);
    $('#immun_select_follow6').prop('checked', false);
    $('#immun_select_follow7').prop('checked', false);
    $('#immun_select_follow7_show').hide();
    $('#rituximab_1').prop('checked', false);
    $('#rituximab_2').prop('checked', false);
    $('#rituximab_3').prop('checked', false);
    $('#rituximab_4').prop('checked', false);
    $('#immun_other_text').val('');
    $('#date_rad_follow').val('');
    $('#date_surgery_follow').val('');


  }

//   Result of Initial Treatment


    $('#result_follow_no_complete').hide();
    $('#result_follow_complete').hide();
    $('#result_follow_cr_complete').hide();
	
	
	
    $('#cause').hide();
	if($('#ch_in_id').val()=="Indeterminate (ID)"){    $('#cause').show();}
	
    if($('#result_follow1').is(':checked')){
      $('#result_follow_cr_complete').show();
    }
    if($('#result_follow2').is(':checked')){
      $('#result_follow_complete').show();
    }
 

  $('#result_follow2').click(function(){
    clear_data_result_follow();
    $('#result_follow_no_complete').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_complete').show();
    $('#cause').hide();

  });

  $('#result_follow1').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_no_cr_complete').hide();
    $('#result_follow_cr_complete').show();
  });
  $('#result_follow3').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow4').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow5').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#cause').hide();
    $('#result_follow_cr_complete').hide();
    $('#result_follow_no_complete').show();
  });
  $('#result_follow6').click(function(){
    clear_data_result_follow();
    $('#result_follow_complete').hide();
    $('#result_follow_cr_complete').hide();
    $('#cause').show();
  });
  function clear_data_result_follow(){
    $('#date_complete_follow').val('');
    $('#result_cause_follow1').prop('checked', false);
    $('#result_cause_follow2').prop('checked', false);
  }



// Progression/relapse





    
    $('#sub_progression_follow_no').hide();
    $('#sub_progression_follow_yes').hide();
    if($('#progression_follow_yes').is(':checked')){
      $('#sub_progression_follow_yes').show();
    }

    if($('#extranodal_follow').is(':checked')){
     
      ch_attr(false);
    }else{
     
      ch_attr(true);
      clear_data_extran();
  
    }




  $('#progression_follow_yes').click(function(){
    clear_data();
    $('#sub_progression_follow_no').hide();
    $('#sub_progression_follow_yes').show();
  });

  $('#progression_follow_no').click(function(){
    clear_data();
    $('#sub_progression_follow_yes').hide();
    $('#sub_progression_follow_no').show();
  });

  function clear_data(){
    $('#date_progression_follow').val('');
    $('#histology_follow1').prop('checked', false);
    $('#histology_follow2').prop('checked', false);
    $('#histology_follow3').prop('checked', false);
    $('#lymphnode_follow').prop('checked', false);
    $('#extranodal_follow').prop('checked', false);
    $('#extr_1_follow').prop('checked', false);
    $('#extr_2_follow').prop('checked', false);
    $('#extr_3_follow').prop('checked', false);
    $('#extr_4_follow').prop('checked', false);
    $('#extr_5_follow').prop('checked', false);
    $('#extr_6_follow').prop('checked', false);
    $('#extr_7_follow').prop('checked', false);
    $('#extr_8_follow').prop('checked', false);
    $('#extr_9_follow').prop('checked', false);
    $('#extr_10_follow').prop('checked', false);
    $('#extr_11_follow').prop('checked', false);
    $('#extr_12_follow').prop('checked', false);
    $('#extr_13_follow').prop('checked', false);
    $('#extr_14_follow').prop('checked', false);
    $('#extr_15_follow').prop('checked', false);
    $('#extr_16_follow').prop('checked', false);
    $('#extr_17_follow').prop('checked', false);
    $('#extr_other').prop('checked', false);
    $('#extr_other_text').val('');
    ch_attr(true);
    clear_data_extran();
  }

  

  $('#extranodal_follow').click(function(){
  
    if($('#extranodal_follow').is(':checked')){
  
      ch_attr(false);

      if ($('#extr_other').is(':checked')) {
        $('#extr_other_text').attr("disabled", false);
      } else {
        $('#extr_other_text').attr("disabled", true);
      };
    }else{
      ch_attr(true);
      clear_data_extran();
  
    }
  });

  if ($('#extr_other').is(':checked')) {
    $('#extr_other_text').attr("disabled", false);
  } else {
    $('#extr_other_text').attr("disabled", true);
  };

  $('#extr_other').click(function () {
    $('#extr_other_text').val('');
    if ($('#extr_other').is(':checked')) {
      $('#extr_other_text').attr("disabled", false);
    }else{
      $('#extr_other_text').attr("disabled", true);
    };
  });

  
  
  function ch_attr(status){
    $('#extr_1_follow').attr("disabled", status);
    $('#extr_2_follow').attr("disabled", status);
    $('#extr_3_follow').attr("disabled", status);
    $('#extr_4_follow').attr("disabled", status);
    $('#extr_5_follow').attr("disabled", status);
    $('#extr_6_follow').attr("disabled", status);
    $('#extr_7_follow').attr("disabled", status);
    $('#extr_8_follow').attr("disabled", status);
    $('#extr_9_follow').attr("disabled", status);
    $('#extr_10_follow').attr("disabled", status);
    $('#extr_11_follow').attr("disabled", status);
    $('#extr_12_follow').attr("disabled", status);
    $('#extr_13_follow').attr("disabled", status);
    $('#extr_14_follow').attr("disabled", status);
    $('#extr_15_follow').attr("disabled", status);
    $('#extr_16_follow').attr("disabled", status);
    $('#extr_17_follow').attr("disabled", status);
    $('#extr_other').attr("disabled", status);
    $('#extr_other_text').attr("disabled", status);
  }
  
  function clear_data_extran(){
    $('#extr_1_follow').prop('checked', false);
    $('#extr_2_follow').prop('checked', false);
    $('#extr_3_follow').prop('checked', false);
    $('#extr_4_follow').prop('checked', false);
    $('#extr_5_follow').prop('checked', false);
    $('#extr_6_follow').prop('checked', false);
    $('#extr_7_follow').prop('checked', false);
    $('#extr_8_follow').prop('checked', false);
    $('#extr_9_follow').prop('checked', false);
    $('#extr_10_follow').prop('checked', false);
    $('#extr_11_follow').prop('checked', false);
    $('#extr_12_follow').prop('checked', false);
    $('#extr_13_follow').prop('checked', false);
    $('#extr_14_follow').prop('checked', false);
    $('#extr_15_follow').prop('checked', false);
    $('#extr_16_follow').prop('checked', false);
    $('#extr_17_follow').prop('checked', false);
    $('#extr_other').prop('checked', false);
    $('#extr_other_text').val('');
  }


// Salvage treatment salvage regimen (mark all that apply)


  $('#salvage_follow_no_detail').hide();
  $('#salvage_follow_detail').hide();

  if($('#salvage_follow_yes').is(':checked')){
   $('#salvage_follow_detail').show();
 }



$('#salvage_follow_yes').click(function(){
 clear_data_salvage();
 $('#salvage_follow_no_detail').hide();
 $('#salvage_follow_detail').show();
});

$('#salvage_follow_no').click(function(){
 clear_data_salvage();
 $('#salvage_follow_detail').hide();
 $('#salvage_follow_no_detail').show();
});


  if ($('#chemo_follow_29').is(':checked')) {
    $('#chemo_other_follow_29').attr("disabled", false);
  } else {
    $('#chemo_other_follow_29').attr("disabled", true);
  };

  $('#chemo_follow_29').click(function () {
  
    $('#chemo_other_follow_29').val('');
    if ($('#chemo_follow_29').is(':checked')) {
      $('#chemo_other_follow_29').attr("disabled", false);
    } else {
      $('#chemo_other_follow_29').attr("disabled", true);
    };
  });

function clear_data_salvage(){
  $('#chemo_follow_1').prop('checked', false);
  $('#chemo_follow_2').prop('checked', false);
  $('#chemo_follow_3').prop('checked', false);
  $('#chemo_follow_4').prop('checked', false);
  $('#chemo_follow_5').prop('checked', false);
  $('#chemo_follow_6').prop('checked', false);
  $('#chemo_follow_7').prop('checked', false);
  $('#chemo_follow_8').prop('checked', false);
  $('#chemo_follow_9').prop('checked', false);
  $('#chemo_follow_10').prop('checked', false);
  $('#chemo_follow_11').prop('checked', false);
  $('#chemo_follow_12').prop('checked', false);
  $('#chemo_follow_13').prop('checked', false);
  $('#chemo_follow_14').prop('checked', false);
  $('#chemo_follow_15').prop('checked', false);
  $('#chemo_follow_16').prop('checked', false);
  $('#chemo_follow_17').prop('checked', false);
  $('#chemo_follow_18').prop('checked', false);
  $('#chemo_follow_19').prop('checked', false);
  $('#chemo_follow_20').prop('checked', false);
  $('#chemo_follow_21').prop('checked', false);
  $('#chemo_follow_22').prop('checked', false);
  $('#chemo_follow_23').prop('checked', false);
  $('#chemo_follow_24').prop('checked', false);
  $('#chemo_follow_25').prop('checked', false);
  $('#chemo_follow_26').prop('checked', false);
  $('#chemo_follow_27').prop('checked', false);
  $('#chemo_follow_28').prop('checked', false);
  $('#chemo_follow_29').prop('checked', false);
  $('#chemo_other_follow_29').attr('disabled', true);
  $('#chemo_other_follow_29').val('');
  $('#sub_immunotherapy_follow_yes').prop('checked', false);
  $('#sub_immunotherapy_follow_no').prop('checked', false);
  $('#sal_immun_1').prop('checked', false);
  $('#sal_immun_2').prop('checked', false);
  $('#sal_immun_3').prop('checked', false);
  $('#sal_immun_3_1').prop('checked', false);
  $('#sal_immun_3_2').prop('checked', false);
  $('#sal_immun_4').prop('checked', false);
  $('#sal_immun_4_text').val('');
  $('#sal_immun_4_text').attr('disabled', true);
  $('#sal_radio_follow').prop('checked', false);
  $('#sal_surgery_follow').prop('checked', false);

}



  $('#sub_immunotherapy_no_detail').hide();
  $('#sub_immunotherapy_detail').hide();

  if($('#sub_immunotherapy_follow_yes').is(':checked')){
   $('#sub_immunotherapy_detail').show();

 }
 

$('#sub_immunotherapy_follow_yes').click(function(){
 clear_data_immun();
 $('#sub_immunotherapy_no_detail').hide();
 $('#sub_immunotherapy_detail').show();
});

$('#sub_immunotherapy_follow_no').click(function(){
 clear_data_immun();
 $('#sub_immunotherapy_detail').hide();
 $('#sub_immunotherapy_no_detail').show();
});


  if ($('#sal_immun_4').is(':checked')) {
    $('#sal_immun_4_text').attr("disabled", false);
  } else {
    $('#sal_immun_4_text').attr("disabled", true);
  };

  $('#sal_immun_4').click(function () {
  
    $('#sal_immun_4_text').val('');
    if ($('#sal_immun_4').is(':checked')) {
      $('#sal_immun_4_text').attr("disabled", false);
    } else {
      $('#sal_immun_4_text').attr("disabled", true);
    };
  });

function clear_data_immun(){
 $('#sal_immun_1').prop('checked', false);
 $('#sal_immun_2').prop('checked', false);
 $('#sal_immun_3').prop('checked', false);
 $('#sal_immun_3_1').prop('checked', false);
 $('#sal_immun_3_2').prop('checked', false);
 $('#sal_immun_4').prop('checked', false);
 $('#sal_immun_4_text').attr('disabled', true);
 $('#sal_immun_4_text').val('');
}





//Stem cell transplant:


   
      $('#stem_cell_method_autologous_detail').hide();
      $('#stem_cell_method_allogeneic_detail').hide();
      if($('#stem_cell_method_allogeneic').is(':checked')){
        $('#stem_cell_method_allogeneic_detail').show();
      }
 
    $('#stem_cell_method_autologous').click(function(){
      clear_data_auto();
      $('#stem_cell_method_allogeneic_detail').hide();
      $('#stem_cell_method_autologous_detail').show();
    });

    $('#stem_cell_method_allogeneic').click(function(){
      clear_data_auto();
      $('#stem_cell_method_autologous_detail').hide();
      $('#stem_cell_method_allogeneic_detail').show();
    });

    function clear_data_auto(){
      $('#conditioning1').prop('checked', false);
      $('#conditioning2').prop('checked', false);
      $('#donor_follow1').prop('checked', false);
      $('#donor_follow2').prop('checked', false);
      $('#donor_follow3').prop('checked', false);
      $('#donor_follow4').prop('checked', false);
      $('#donor_follow_other').attr('disabled', true);
      $('#donor_follow_other').val('');
    }
 


  if ($('#donor_follow4').is(':checked')) {
    $('#donor_follow_other').attr("disabled", false);
  } else {
    $('#donor_follow_other').attr("disabled", true);
  };

  $('input[type="radio"][name="donor_follow"]').click(function () {
    $('#donor_follow_other').val('');
    if ($('#donor_follow4').is(':checked')) {
      $('#donor_follow_other').attr("disabled", false);
    } else {
      $('#donor_follow_other').attr("disabled", true);
    };
  });

 
    $('#stem_cell_follow_no_detail').hide();
    $('#stem_cell_follow_detail').hide();
    if($('#stem_cell_follow_yes').is(':checked')){
      $('#stem_cell_follow_detail').show();
    }

  $('#stem_cell_follow_yes').click(function(){
    clear_data_cell();
    $('#stem_cell_follow_no_detail').hide();
    $('#stem_cell_follow_detail').show();
  });

  $('#stem_cell_follow_no').click(function(){
    clear_data_cell();
    $('#stem_cell_follow_detail').hide();
    $('#stem_cell_follow_no_detail').show();
  });

  function clear_data_cell(){
    $('#stem_cell_method_allogeneic_detail').hide();
    $('#date_stem_cell_follow').val('');
    $('#stem_cell_method_autologous').prop('checked', false);
    $('#stem_cell_method_allogeneic').prop('checked', false);

  }

// Date of last Contact :



  $('#alive').hide();
  $('#dead').hide();
  $('#loss_contact').hide();
  if($('#status_follow_alive').is(':checked')){
    $('#alive').show();
  }
  if($('#status_follow_dead').is(':checked')){
    $('#dead').show();
  }


$('#status_follow_alive').click(function(){
  clear_data_contacty();
  $('#dead').hide();
  $('#loss_contact').hide();
  $('#alive').show();
});

$('#status_follow_dead').click(function(){
  clear_data_contacty();
  $('#alive').hide();
  $('#loss_contact').hide();
  $('#dead').show();
});
$('#status_follow3').click(function(){
  clear_data_contacty();
  $('#alive').hide();
  $('#dead').hide();
  $('#loss_contact').show();
});

  if ($('#cause_of_dead4').is(':checked')) {
    $('#cause_of_dead_other').attr('disabled', false);
  } else {
    $('#cause_of_dead_other').val('');
    $('#cause_of_dead_other').attr('disabled', true);
  };

  $('input[type="radio"][name="cause_of_dead"]').click(function(){
    if ($('#cause_of_dead4').is(':checked')) {
      $('#cause_of_dead_other').attr('disabled', false);
    } else {
      $('#cause_of_dead_other').val('');
      $('#cause_of_dead_other').attr('disabled', true);
    };
});



function clear_data_contacty(){
  $('#alive_status1').prop('checked', false);
  $('#alive_status2').prop('checked', false);
  $('#date_date_follow').val('');
  $('#cause_of_dead1').prop('checked', false);
  $('#cause_of_dead2').prop('checked', false);
  $('#cause_of_dead3').prop('checked', false);
  $('#cause_of_dead4').prop('checked', false);
  $('#cause_of_dead_other').val('');
  $('#cause_of_dead_other').attr('disabled' , true);

  $('#lymphoma_status1').prop('checked', false);
  $('#lymphoma_status2').prop('checked', false);
  $('#lymphoma_status3').prop('checked', false);
}




// Button Save





function verify_input(){
  console.log(check_input_text()|| ! check_radio() || !checkimmun_select_follow1());
  // console.log(($('#result_follow1:checked').val() || $('#result_follow2:checked').val() ||
// $('#result_follow3:checked').val() || $('#result_follow4:checked').val() ||
// $('#result_follow5:checked').val() || $('#result_follow6:checked').val()));
 return  check_input_text()|| ! check_radio() || !checkimmun_select_follow1();
}
function check_input_text(){
return document.getElementById('date_last_contact_follow').value==""
;
}

function check_radio(){
return ($('#chemotherapy_follow_yes:checked').val() || $('#chemotherapy_follow_no:checked').val()) &&
($('#immunotherapy_follow_yes:checked').val()|| $('#immunotherapy_follow_no:checked').val()) &&
($('#radiotherapy_follow_yes:checked').val() || $('#radiotherapy_follow_no:checked').val()) &&
($('#surgery_follow_yes:checked').val() || $('#surgery_follow_no:checked').val()) &&
($('#result_follow1:checked').val() || $('#result_follow2:checked').val() ||$('#result_follow3:checked').val() || $('#result_follow4:checked').val() || $('#result_follow5:checked').val() || $('#result_follow6:checked').val()) &&
($('#progression_follow_yes:checked').val() || $('#progression_follow_no:checked').val()) &&
($('#salvage_follow_yes:checked').val() || $('#salvage_follow_no:checked').val()) &&
($('#stem_cell_follow_yes:checked').val() || $('#stem_cell_follow_no:checked').val()) &&
($('#status_follow_alive:checked').val() || $('#status_follow_dead:checked').val() || $('#status_follow3:checked').val());
}
function checkimmun_select_follow1(){
if($('#immun_select_follow1').is(':checked')){
return $('#rituximab_1').is(':checked') ||  $('#rituximab_2').is(':checked') ;
}
return true;
}
  //-->


  
});