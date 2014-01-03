<div id="home_home">
<!--/div> <!--End of header_container-->



	<h2>Welcome to ComTAR</h2>
	<h3>ComTAR allows users to analyze the variations of known miRNA targets during evolution and to predict previously unknown interactions by focusing on the conservation of the potential targeting.</h3>
   	
    
    <h2>Features</h2>
    
  <ul>
    <li><h1><a href="<?php echo base_url(); ?>targets">Find potential miRNA targets </a><span class='target_button'><a  class="button_more">Read more &#9654;</span></a></span></h2></li>
    <p class='targets'>Allows the characterization of miRNA-target interactions in different plant species and the prediction of new candidates mainly based in the conservation of the miRNA-target pair with a relaxed number of mismatches.
</p>
    <li><h1><a href="<?php echo base_url(); ?>family">Find potential miRNA target families</a><span class='family_button'> <a  class="button_more">Read more &#9654;</a></span></h2></li>
    <p class='family'>Allows the prediction of new candidates of genes coding for proteins of the same family.</p>
    <li><h1><a href="<?php echo base_url(); ?>whereis/index/0">Is this gene a potential miRNA target?</a><span class='whereis_button'> <a  class="button_more">Read more &#9654;</a></span></h2></li>
    
    <p class='whereis'>Allows users to introduce a particular Arabidopsis thaliana locus tag or Phytozome gene ID and comTAR identifies the species where this particular gene can be a miRNA target. </p>
  </ul>
  
    <h2>Advanced features</h2>
    <ul>
        <li><h1><a href="<?php echo base_url(); ?>bysequence">Search your own sequences </a><span class='own_button'><a  class="button_more">Read more &#9654;</span></a></span></h2></li>
        <p class='own'>Allows users to introduce their own sequence to search for potential miRNA targets. Sequence must be 18 nt long<a href='#'class="tooltip">[?]<span><img class="callout" src= "<?php echo site_url();?>/css/callout.gif" />
			<strong>18 nt<br/></strong>As miRNA sequences can vary in different species, specially positions 1, 20 and 21, we used sequences 2-19 (18 nt) for the search.</span>
         </a>(positions 2–19).</p>

    </ul>

   <h2>Help</h2>
    <h3>
    Comtar contains precomputed data for <a href="<?php echo base_url(); ?>targets/mirna_list">22 conserved miRNAs</a> where you can browse the results, and change the input parameters. By contrast, query your own sequences are time consuming and results will be delivered within 1 day. You have to enter your email in order to get the results.
    </h3>

    <h3>Got any doubts? Check out the question mark<a href='#'class="tooltip">[?]<span>
			<img class="callout" src= "<?php echo site_url();?>/css/callout.gif" >
			<strong>Help<br/></strong>When you hover the quesition mark with your mouse, the help is displayed</span>
   </a>next to each title!</p>
   </h3>
   
   
   <h2>Target search options</h2>
   
   <h3>
    You can define several parameters for each search, such as the mismatch filter, the minimum free energy cutoff and the minimum number of species.
   <ul>
   <li>Mismatch filter: only one mismatch is allowed between position 1 and 11 of the miRNA consensus sequence.</li>
   <li>The minimum free energy cutoff: We defined a target as predicted if its minimum free energy is below the chosen cutoff. </li>
   <li>The minimum number of species where the same tag is present for a particular miRNA. </li>
   

   </ul>
   </h3>

   <h2>How to cite</h2>
   <h3>ComTAR....</h3>
        


</div>
</div> <!--End of header_container-->

<script>
$(document).ready(function(){
    $("p.targets").hide();
    $("span.target_button").click(function(){
        $("p.targets").show("slow");
        $("span.target_button").hide();
  });
    $("p.targets").click(function(){
        $("span.target_button").show();
        $("p.targets").hide();
  });
});

$(document).ready(function(){
    $("p.family").hide();
    $("span.family_button").click(function(){
        $("p.family").show("slow");
        $("span.family_button").hide();
  });
    $("p.family").click(function(){
        $("span.family_button").show();
        $("p.family").hide();
  });
});

$(document).ready(function(){
    $("p.whereis").hide();
    $("span.whereis_button").click(function(){
        $("p.whereis").show("slow");
        $("span.whereis_button").hide();
  });
    $("p.whereis").click(function(){
        $("span.whereis_button").show();
        $("p.whereis").hide();
  });
});

$(document).ready(function(){
    $("p.own").hide();
    $("span.own_button").click(function(){
        $("p.own").show("slow");
        $("span.own_button").hide();
  });
    $("p.own").click(function(){
        $("span.own_button").show();
        $("p.own").hide();
  });
});

</script>
