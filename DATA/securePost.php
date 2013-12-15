<form action="<?php echo $_SERVER['PHP_SELF']."?topic=".$topicID."&page=".$curPage; ?>" method="post">
	<p>You are not logged in, to post please complete CAPTHA</p>
	<?php
			$subCount++;
            echo '<div class="captchabox">';
            $rand = rand(0,21);
            echo '<img class="captcha" src="DATA/Images/' . $rand . '.jpg" alt="CAPTCHA image"/>';
            echo '<label for="country"><p class="required">*</p>Select What the picture is displaying:</label>';
            echo '<SELECT NAME="words" required="required">
            <OPTION>airplane</OPTION>
            <OPTION>ant</OPTION>
            <OPTION>apple</OPTION>
            <OPTION>army</OPTION>
            <OPTION>baby</OPTION>
            <OPTION>bag</OPTION>
            <OPTION>ball</OPTION>
            <OPTION>basket</OPTION>
            <OPTION>bath</OPTION>
            <OPTION>banana</OPTION>
            <OPTION>bed</OPTION>
            <OPTION>bee</OPTION>
            <OPTION>bell</OPTION>
            <OPTION>bird</OPTION>
            <OPTION>bone</OPTION>
            <OPTION>boots</OPTION>
            <OPTION>bottles</OPTION>
            <OPTION>brain</OPTION>
            <OPTION>bridge</OPTION>
            <OPTION>bulb</OPTION>
            <OPTION>butterfly</OPTION>
            <OPTION>cake</OPTION>
            <OPTION>camera</OPTION>
            <OPTION>card</OPTION>
            <OPTION>cat</OPTION>
            <OPTION>cheese</OPTION>
            <OPTION>church</OPTION>
            <OPTION>clock</OPTION>
            <OPTION>coconut</OPTION>
            <OPTION>coin</OPTION>
            <OPTION>cow</OPTION>
            <OPTION>cup</OPTION>
            <OPTION>dog</OPTION>
            <OPTION>doll</OPTION>
            <OPTION>drop</OPTION>
            <OPTION>egg</OPTION>
            <OPTION>elephant</OPTION>
            <OPTION>family</OPTION>
            <OPTION>finger</OPTION>
            <OPTION>fish</OPTION>
            <OPTION>girl</OPTION>
            <OPTION>goat</OPTION>
            <OPTION>gun</OPTION>
            <OPTION>hammer</OPTION>
            <OPTION>heart</OPTION>
            <OPTION>horse</OPTION>
            <OPTION>hospital</OPTION>
            <OPTION>jewel</OPTION>
            <OPTION>lock</OPTION>
            <OPTION>map</OPTION>
            <OPTION>monkey</OPTION>
            <OPTION>moon</OPTION>
            <OPTION>muscle</OPTION>
            <OPTION>net</OPTION>
            <OPTION>nut</OPTION>
            <OPTION>pig</OPTION>
            <OPTION>pizza</OPTION>
            <OPTION>pool</OPTION>
            <OPTION>rat</OPTION>
            <OPTION>root</OPTION>
            <OPTION>sail</OPTION>
            <OPTION>sheep</OPTION>
            <OPTION>snake</OPTION>
            <OPTION>sock</OPTION>
            <OPTION>stamp</OPTION>
            <OPTION>star</OPTION>
            <OPTION>stomach</OPTION>
            <OPTION>store</OPTION>
            <OPTION>ticket</OPTION>
            <OPTION>tooth</OPTION>
            <OPTION>train</OPTION>
            <OPTION>umbrella</OPTION>
            <OPTION>volcano</OPTION>
            <OPTION>wheel</OPTION>
            <OPTION>wire</OPTION>
            <OPTION>worm</OPTION>
            </SELECT>';
            echo '<input type="hidden" value="' . $rand . '" name="id" />';
			echo '<input type="hidden" value="' . $_POST['response'] . '" name="response" />';
			echo '<input type="hidden" value="'. $subCount .'" name="subCount" />';
            echo '</div>';
    ?>
    <input type="submit" value="Submit" name="submit" class="button" />
</form>