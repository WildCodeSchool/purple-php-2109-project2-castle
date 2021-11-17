/**
 * creation of a game reset pop-up with are
 * you sure you want to leave and redirect to the home page 
 */
function scriptReset()
{
    if ( confirm( "Are you sure you want to leave the game?" ) ) {
        document.location.href = '/reset';
    }
}


