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

function scriptResetCastle0()
{
    if ( confirm( "Your ramparts have fallen, the enemy is here! Do you want to take refuge in the nearby castle?" ) ) {
        document.location.href = '/reset';
    }
}
