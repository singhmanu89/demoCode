</body>
<script>
    
    $(document).ready(function() {
       
    $("input[name$='multipleunit']").click(function() {
        var test = $(this).val();
 if(test==2){
       $("#unit_nameBox").show();
   }else{
      $("#unit_nameBox").hide(); 
       
   }
        
    });
    
        $("input[name$='leaseduration']").click(function() {
        var test = $(this).val();
        alert(test);
 if(test==2){
       $("#leaseSetId").show();
   }else{
      $("#leaseSetId").hide(); 
       
   }
    
});

</script>

</html>