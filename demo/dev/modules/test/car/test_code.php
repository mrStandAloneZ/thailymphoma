 <script src="jquery.min.js"></script>
 <tr>
  <th align="left">Type:</th>
  <td colspan="3" > <br />
  <input type="radio" name="type"  value="Done" id="type1"> Hodgkin lymphoma (HL)  <br />
    <div id="detail_hodgkin">
     <select name="hodgkin_don" id="hodgkin_don1" style="width:300px";>
      <option  value="">Please select..</option>
      <option value="01: Classical HL, Nodular sclerosis">01: Classical HL, Nodular sclerosis</option>
      <option value="02: Classical HL, Mixed cellularity">02: Classical HL, Mixed cellularity </option>
      <option value="03: Classical HL, Lymphocyte-rich">03: Classical HL, Lymphocyte-rich </option>
      <option value="04: Classical HL, Lymphocyte-depleted">04: Classical HL, Lymphocyte-depleted </option>
      <option value="05: HL, Nodular lymphocyte predominant">05: HL, Nodular lymphocyte predominant</option>
      <option value="06: HL, unclassifiable">06: HL, unclassifiable</option>
    </select> 
  </div>
  
  <input type="radio"   name="type" value="Non-Hodgkin"  id="type2"  >   Non-Hodgkin lymphoma (NHL) <br />
  <div id="detail_non_hodgkin">
    <strong>Immunophenotype:    </strong>
    <select name="type_non" id="type_non1" style="width:150px";>
      <option  value="">Please select..</option>
      <option value="B">B</option>
      <option value="T/NK">T/NK</option>
      <option value="Unclassify">Unclassify</option>
      <option value="Not done">Not done</option>
    </select>
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non1"  value="WHO classification"   >  WHO classification  <br />
    <select name="who_sub" id="who_sub" style="width:400px";>
      <option  value="">Please select..</option>
      <option value="07 : Precursor B-lymphoblastic lymphoma">07 : Precursor B-lymphoblastic lymphoma</option>
      <option value="08 : Small lymphocytic lymphoma">08 : Small lymphocytic lymphoma</option>
      <option value="09 : Lymphoplasmacytic lymphoma">09 : Lymphoplasmacytic lymphoma</option>
      <option value="10 : Splenic marginal zone lymphoma">10 : Splenic marginal zone lymphoma</option>
      <option value="11 : Extranodal marginal zone lymphoma of MALT type">11 : Extranodal marginal zone lymphoma of MALT type</option>
      <option value="12 : Nodal marginal zone lymphoma">12 : Nodal marginal zone lymphoma</option>
      <option value="13 : Follicular lymphoma, grade 1">13 : Follicular lymphoma, grade 1</option>
      <option value="14 : Follovuar lymphoma, grade 2">14 : Follovuar lymphoma, grade 2</option>
      <option value="15 : Follicular lymphoma, grade 3">15 : Follicular lymphoma, grade 3</option>
      <option value="16 : Mantle cell lymphoma">16 : Mantle cell lymphoma</option>
      <option value="17 : Diffuse large B-cell lymphoma (DLBCL), NOS">17 : Diffuse large B-cell lymphoma (DLBCL), NOS</option>
      <option value="18 : Mediastinal (thymic) large B-cell lymphoma">18 : Mediastinal (thymic) large B-cell lymphoma</option>
      <option value="19 : Intravascular large B-cell lymphoma">19 : Intravascular large B-cell lymphoma</option>
      <option value="20 : Primary effusion lymphoma">20 : Primary effusion lymphoma</option>
      <option value="21 : Burkitt lymphoma">21 : Burkitt lymphoma</option>
      <option value="22 : Lymphomatioid granulomatosis">22 : Lymphomatioid granulomatosis</option>
      <option value="23 : Post-transplant lymphoproliferative disorders(PTLD)">23 : Post-transplant lymphoproliferative disorders(PTLD)</option>
      <option value="24 : Precursor T-lymphoblastic lymphoma">24 : Precursor T-lymphoblastic lymphoma</option>
      <option value="25 : Extranodal NK/T-cell lymphoma, nasal type">25 : Extranodal NK/T-cell lymphoma, nasal type</option>
      <option value="26 : Enteropathy-type T-cell lymphoma">26 : Enteropathy-type T-cell lymphoma</option>
      <option value="27 : Hepatosplenic T-cell lymphoma">27 : Hepatosplenic T-cell lymphoma</option>
      <option value="28 : Subcutaneous panniculitis-like T-cell lymphoma">28 : Subcutaneous panniculitis-like T-cell lymphoma</option>
      <option value="29 : Aggressive NK-cell leukemia/lymphoma">29 : Aggressive NK-cell leukemia/lymphoma</option>
      <option value="30 : Mycosis fungoides/Sezary syndrome">30 : Mycosis fungoides/Sezary syndrome</option>
      <option value="31 : Angioimmunblastic T-cell lymphoma">31 : Angioimmunblastic T-cell lymphoma</option>
      <option value="32 : Primary cutaneous anaplastic large cell lymphoma">32 : Primary cutaneous anaplastic large cell lymphoma</option>
      <option value="33 : Anaplastic large cell lymphoma, ALK positive">33 : Anaplastic large cell lymphoma, ALK positive</option>
      <option value="34 : Peripheal T-cell lymphoma, unspecified, NOS">34 : Peripheal T-cell lymphoma, unspecified, NOS</option>
      <option value="--**New entity**--">--**New entity**--</option>
      <option value="35 : T-cell/histiocyte-rich large B-cell lymphoma">35 : T-cell/histiocyte-rich large B-cell lymphoma</option>
      <option value="36 : Primary cutaneous follicle enter lymphoma">36 : Primary cutaneous follicle enter lymphoma</option>
      <option value="37 : Primary DLBCL of the CNS">37 : Primary DLBCL of the CNS</option>
      <option value="38 : Primry cutaneous DLBCL, leg type ">38 : Primry cutaneous DLBCL, leg type </option>
      <option value="39 : EBV positive DLBCL of the elderly ">39 : EBV positive DLBCL of the elderly </option>
      <option value="40 : ALK positive large b-cell lymphoma">40 : ALK positive large b-cell lymphoma</option>
      <option value="41 : Plasmablastic lymphoma">41 : Plasmablastic lymphoma</option>
      <option value="42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease">42 : Large B-cell lymphoma arising in HHV8-associated multicentric Castleman disease</option>
      <option value="43 : With features intermediate between DLBCL and Burkitt lymphoma">43 : With features intermediate between DLBCL and Burkitt lymphoma</option>
      <option value="44 : With features intermediate between DLBCL and classical Hodgkin">44 : With features intermediate between DLBCL and classical Hodgkin</option>
      <option value="45 : Chronic lymphoproliferative disorder of NK-cells">45 : Chronic lymphoproliferative disorder of NK-cells</option>
      <option value="46 : Lymphomatoid papulosis">46 : Lymphomatoid papulosis</option>
      <option value="47 : Primary cutaneous gamma-delta T-cell lymphoma">47 : Primary cutaneous gamma-delta T-cell lymphoma</option>
      <option value="48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma">48 : Primary cutaneous CD8 positive aggressive epidermotropic cytotoxic T-cell lymphoma</option>
      <option value="49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma">49 : Primary cutaneous CD4 positive small/medium T-cell lymphoma</option>
      <option value="50 : Anaplastic large cell lymphoma, ALK negative">50 : Anaplastic large cell lymphoma, ALK negative</option>
    </select>
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non2"  value="Working formulation"  >  Working formulation  <br />

    <select name="work_sub" id="work_sub" style="width:400px";>
      <option  value="">Please select..</option>
      <option value="07 : NHL, small lymphocytic without plasmacytoid differentiation">07 : NHL, small lymphocytic without plasmacytoid differentiation</option>
      <option value="08 : NHL, small lymphocytic with plasmacytoid differentiation">08 : NHL, small lymphocytic with plasmacytoid differentiation</option>
      <option value="09 : NHL, follicular, small cleaved">09 : NHL, follicular, small cleaved</option>
      <option value="10 : NHL, follicular, mixed small cleaved and large cell">10 : NHL, follicular, mixed small cleaved and large cell</option>
      <option value="11 : NHL, follicular, large cell">11 : NHL, follicular, large cell</option>
      <option value="12 : NHL, diffuse, small cleaved">12 : NHL, diffuse, small cleaved</option>
      <option value="13 : NHL, diffuse, mixed small and large cell">13 : NHL, diffuse, mixed small and large cell</option>
      <option value="14 : NHL, diffuse, large cell">14 : NHL, diffuse, large cell</option>
      <option value="15 : NHL, large cell immunoblastic">15 : NHL, large cell immunoblastic</option>
      <option value="16 : NHL, lymphoblastic type">16 : NHL, lymphoblastic type</option>
      <option value="17 : NHL, small non-cleaved Burkitt type">17 : NHL, small non-cleaved Burkitt type</option>
      <option value="18 : NHL, small non-cleaved non-Burkitt type">18 : NHL, small non-cleaved non-Burkitt type</option>
      <option value="19 : Composite lymphoma">19 : Composite lymphoma</option>
      <option value="20 : Histiocytic lymphoma">20 : Histiocytic lymphoma</option>
      <option value="21 : Mycosis fungoides/Sezary syndrome">21 : Mycosis fungoides/Sezary syndrome</option>
      <option value="22 : NHL, unclassifiable">22 : NHL, unclassifiable</option>
    </select> 
    <br />
    <input type="radio" name="type_sub_non"  id="type_sub_non3"  value="99 Other type"  >  99 Other type  <br />
    <textarea name="other_type" cols="50" rows="4" class="smallTextBlack" id="other_type" placeholder="Please specify..."></textarea>

  </div>

  <script type="text/javascript">
    $(document).ready(function() {
     $('#detail_non_hodgkin').hide();
     $('#detail_hodgkin').hide();
     $('#who_sub').hide();
     $('#work_sub').hide();
     $('#other_type').hide();
   });

    $('#type1').click(function(){
     clear_data();
     $('#detail_non_hodgkin').hide();
     $('#detail_hodgkin').show();
     $('#who_sub').hide();
     $('#work_sub').hide();
     $('#other_type').hide();

   });

    $('#type2').click(function(){
     clear_data();
     $('#detail_hodgkin').hide();
     $('#detail_non_hodgkin').show();
     $('#type_sub_non1').show();
     $('#type_sub_non2').show();
     $('#type_sub_non3').show();

   });

    $('#type_sub_non1').click(function(){
     clear_sub_data();
     $('#who_sub').show();
     $('#work_sub').hide();
     $('#other_type').hide();
   });

    $('#type_sub_non2').click(function(){
     clear_sub_data();
     $('#who_sub').hide();
     $('#work_sub').show();
     $('#other_type').hide();
   });

    $('#type_sub_non3').click(function(){
     clear_sub_data();
     $('#who_sub').hide();
     $('#work_sub').hide();
     $('#other_type').show();
   });

    function clear_data(){
     $('#hodgkin_don1').val('');
     $('#type_sub_non1').prop('checked',false);
     $('#type_sub_non2').prop('checked',false);
     $('#type_sub_non3').prop('checked',false);
     $('#type_non1').val('');
     clear_sub_data();

   }
    function clear_sub_data(){
     $('#who_sub').val('');
     $('#work_sub').val('');
     $('#other_type').val('');
   }
 </script>