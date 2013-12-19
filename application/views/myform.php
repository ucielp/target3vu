<div id="bysequence">

<!--form action="/bysequence" method="POST"-->
<p><?php echo form_open('bysequence/success');?></p>



<h1>Name</h1>
    <p>    <input name="name"  type="text" data-validation="length" data-validation-length="min3"   </p>
    
<h1>E-mail</h1>
    <p>     <input name="email"  type="text" data-validation="email">     </p>
    
<h1>Country</h1>
    <p>     <input name="user_country" data-validation="country" >    </p>
    
<h1>18nt miRNA sequence (position 2-19)</h1>
    <p>    <input name="sequence"  type="sequence" data-validation="rna_validation">   </p>
  
    <p>    <input type="submit">    </p>
    

  
</form>
 
<script>

$.formUtils.addValidator({
  name : 'rna_validation',
  validatorFunction : function(value) {
    $val = value.length
    return value.match(/^[CAGUTcagut]+$/i) && value.length == 18;
  },
  
  errorMessage : 'You have to give a 18nt miRNA sequence length',
  errorMessageKey: 'badRNAsequence'
});

$.validate({
/*
    validateOnBlur : false, // disable validation when input looses focus
    errorMessagePosition : 'top', // Instead of 'element' which is default
    onSuccess : function() {
      alert('The form is valid!');
      return false; // Will stop the submission of the form
    },
*/
  modules : 'location',
  onModulesLoaded : function() {
    $('input[name="user_country"]').suggestCountry();
  }
  
});
</script>

</div>
</div> <!--End of header_container-->
