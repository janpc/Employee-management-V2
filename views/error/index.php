<?php

if(!empty($this->data)) {
    echo '<div class="error-messages">
            <button class="error-close">Close</button>';
    foreach($this->data as $errorMessage) {
        echo "<div class='error-message'>$errorMessage</div>";
    }
    echo '</div>';
}
