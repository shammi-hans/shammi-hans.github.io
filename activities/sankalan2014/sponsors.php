<?php

// Each sponsor is an element of the $sponsors array:

$sponsors = array(
	array('nagarro.jpg','Associate Sponsor','http://www.nagarro.com/'),
	array('aricent.jpg','Associate Sponsor','http://www.aricent.com/'),
	array('dlink.jpg','Co-Associate Sponsor','http://www.dlink.co.in/'),
	array('roborium.jpg','Co-Associate Sponsor','http://www.roborium.com/'),
	array('cocacola.jpg','Beverage Partner','http://www.coca-colaindia.com/'),
	array('redtape.jpg','Style Partner','http://www.redtape.com/'),
      	array('gadgetcafe.png','Knowledge Partner','https://www.facebook.com/gadgetcafe'),
	array('vibes.jpg','Other Sponsors','http://www.vibes.co.in/'),
	array('kharidiye.jpg','Other Sponsors','http://www.kharidiye.com/'),
	array('dubeat.jpg','Media Partner','http://www.dubeat.com/'),
	array('twenty19.jpg','Student Internship Partner','http://www.twenty19.com/'),
	array('brainwiz.jpg','knowledge Partner','http://brainwiz.in/'),
	array('qr.jpg','knowledge Partner','http://quikkresu.me/')

);


// Randomizing the order of sponsors:


?>


<div id="sponsors" style="width:100%;position:absolute;" >

<div class="neonPage sponsors" style="position:absolute;">
	<div id="main">

	<div class="sponsorListHolder">

		
        <?php
			
			// Looping through the array:
			
			foreach($sponsors as $company)
			{
				echo'
				<div class="sponsor" title="Click to flip">
					<div class="sponsorFlip">
						<img src="sponsors/'.$company[0].'" alt="More about '.$company[0].'" height="80px" width="80px" />
					</div>
					
					<div class="sponsorData">
						<div class="sponsorDescription">
							'.$company[1].'
						</div>
						<div class="sponsorURL">
							<a href="'.$company[2].'" target="_blank">Click Me</a>
						</div>
					</div>
				</div>
				
				';
			}
		
		?>

        
        
    	<div class="clear"></div>
    </div>

</div>

</div>

</div>