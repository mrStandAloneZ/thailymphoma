 <script src="jquery.min.js"></script>

    <tr>
      <th align="left">Extranodal sites :  (mark all that apply):</th>
      <td colspan="3" > <br />
        <br /> 
        <input type="checkbox" name="ext_none"   value="ext_done"  id="ext_none" >  none
        <div id="ext_none1"></div>
        <div id="extra_site">
          <br /> 
          <input type="checkbox" name="ext_wal"   value="Waldeyer's ring" id="ext_wal"  >  Waldeyer's ring &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_sin"   value="Sinonasal"  id="ext_sin">   Sinonasal  &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_sal"   value="Salivary gland"  id="ext_sal">  Salivary gland  &nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_thy"   value="Thyroid"   id="ext_thy"  > Thyroid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_eye"   value="Eye/Ocular adnexa"   id="ext_eye"> Eye/Ocular adnexa<br /><br />
          <br />
          <input type="checkbox" name="ext_lung"   value="Lung/Pleura"   id="ext_lung">  Lung/Pleura &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?   //******   ฟิลด์ที่เพิ่มขึ้นมาใหม่  ?>
          <input type="checkbox" name="ext_breast"   value="Breast" id="ext_breast" >  Breast   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_stomach"   value="Stomach"  id="ext_stomach"> Stomach  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_small"   value="Small intestine" id="ext_small" > Small intestine  &nbsp;
          <input type="checkbox" name="ext_testis"   value="Testis" id="ext_testis"  > Testis<br /><br />
          <br />
          <input type="checkbox" name="ext_brain"   value="Brain/CNS"  id="ext_brain" > Brain/CNS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_liver"   value="Liver"  id="ext_liver" > Liver  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="checkbox" name="ext_large"   value="Large intestine"   id="ext_large"> Large intestine  &nbsp;&nbsp;
          <input type="checkbox" name="ext_bone"   value="Bone marrow" id="ext_bone"  > Bone marrow  &nbsp;&nbsp;&nbsp;  
          <input type="checkbox" name="ext_spleen"   value="Spleen"   id="ext_spleen"> Spleen  <br /><Br /><Br />
          <input type="checkbox" name="ext_skin"   value="Skin/Subcutaneous"  id="ext_skin" > Skin/Subcutaneous<br /><br /><Br />
          <input type="checkbox" name="ext_other"   value="Others" onclick="show_ext(this.value);" id="ext_other"  > Others 
          <input type="text" name="ext_other_text"    size="50" id="ext_other_text" >  <br />
          *Enter each extranodal site on a new line. <br />
          ** Do not have ','(comma) in text.<br />
          *** Do not leave blank line in text. <br />

        </div>
        <br /><br />
        
      </td>
    </tr>

  <script type="text/javascript">
  $('#ext_none').click(function(){
    if($('#ext_none').is(':checked')){
        change_attr(true);
        clear_data();
    }else{
        change_attr(false);
    }
   });
  function change_attr(status){
    $('#ext_wal').attr("disabled", status);
    $('#ext_sin').attr("disabled", status);
    $('#ext_sal').attr("disabled", status);
    $('#ext_thy').attr("disabled", status);
    $('#ext_eye').attr("disabled", status);
    $('#ext_lung').attr("disabled", status);
    $('#ext_breast').attr("disabled", status);
    $('#ext_stomach').attr("disabled", status);
    $('#ext_small').attr("disabled", status);
    $('#ext_testis').attr("disabled", status);
    $('#ext_brain').attr("disabled", status);
    $('#ext_liver').attr("disabled", status);
    $('#ext_large').attr("disabled", status);
    $('#ext_bone').attr("disabled", status);
    $('#ext_spleen').attr("disabled", status);
    $('#ext_skin').attr("disabled", status);
    $('#ext_other').attr("disabled", status);
    $('#ext_other_text').attr("disabled", status);
  }

  function clear_data(){
    $('#ext_wal').prop('checked', false);
    $('#ext_sin').prop('checked', false);
    $('#ext_sal').prop('checked', false);
    $('#ext_thy').prop('checked', false);
    $('#ext_eye').prop('checked', false);
    $('#ext_lung').prop('checked', false);
    $('#ext_breast').prop('checked', false);
    $('#ext_stomach').prop('checked', false);
    $('#ext_small').prop('checked', false);
    $('#ext_testis').prop('checked', false);
    $('#ext_brain').prop('checked', false);
    $('#ext_liver').prop('checked', false);
    $('#ext_large').prop('checked', false);
    $('#ext_bone').prop('checked', false);
    $('#ext_spleen').prop('checked', false);
    $('#ext_skin').prop('checked', false);
    $('#ext_other').prop('checked', false);
    $('#ext_other_text').val('');
  }
  </script>