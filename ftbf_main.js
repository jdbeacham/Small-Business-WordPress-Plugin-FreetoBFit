// Reveal Edit Classes Options

function ftbfButtonClassesFunction() {
let ftbfButtonRowAdminTwo = document.getElementById('ftbf-buttonrow-admin-two');
ftbfButtonRowAdminTwo.style.display = "flex";

let ftbfswitchadminpaneltwo = document.getElementById('ftbf-switch-admin-panel-two');
ftbfswitchadminpaneltwo.style.display = "none";
}

// Reveal Coummunity List

function ftbfRevealCL() {
    let ftbfButtonRowAdminTwo = document.getElementById('ftbf-buttonrow-admin-two');
    ftbfButtonRowAdminTwo.style.display = "none";
    
    let ftbfswitchadminpaneltwo = document.getElementById('ftbf-switch-admin-panel-two');
ftbfswitchadminpaneltwo.style.display = "block";

let ftbfEditClassContainer = document.getElementById('ftbf-edit-class-container');
    ftbfEditClassContainer.style.display = "none";

    let ftbfListClassesContainer = document.getElementById('ftbf-update-blocks');
    ftbfListClassesContainer.style.display = "none";

    let ftbfDeleteBlocks = document.getElementById('ftbf-delete-blocks');
    ftbfDeleteBlocks.style.display = "none";


}

// Reveal New Class

function ftbfEditClassContainerFunction() {
    let ftbfEditClassContainer = document.getElementById('ftbf-edit-class-container');
    ftbfEditClassContainer.style.display = "block";

    let ftbfListClassesContainer = document.getElementById('ftbf-update-blocks');
    ftbfListClassesContainer.style.display = "none";

    let ftbfDeleteBlocks = document.getElementById('ftbf-delete-blocks');
    ftbfDeleteBlocks.style.display = "none";

    let ftbfButtonRowAdminTwo = document.getElementById('ftbf-buttonrow-admin-two');
ftbfButtonRowAdminTwo.style.display = "flex";
}

//Reveal Existing Classes

function ftbfListClassesContainerFunction() {
    let ftbfListClassesContainer = document.getElementById('ftbf-update-blocks');
    ftbfListClassesContainer.style.display = "flex";

    let ftbfDeleteBlocks = document.getElementById('ftbf-delete-blocks');
    ftbfDeleteBlocks.style.display = "none";

    let ftbfEditClassContainer = document.getElementById('ftbf-edit-class-container');
    ftbfEditClassContainer.style.display = "none";
}

//Reveal Existing Classes for Deletion

function ftbfDeleteBlocks() {
    let ftbfDeleteBlocks = document.getElementById('ftbf-delete-blocks');
    ftbfDeleteBlocks.style.display = "flex";

let ftbfListClassesContainer = document.getElementById('ftbf-update-blocks');
    ftbfListClassesContainer.style.display = "none";

    let ftbfEditClassContainer = document.getElementById('ftbf-edit-class-container');
    ftbfEditClassContainer.style.display = "none";
}

//Hide body for member update

function hideBody() {
    let ftbfBody = document.getElementById('ftbf-body');
    ftbfBody.style.display = "none";
}

//Hide popups

function ftbfX(popValue) {
    newValue = 'ftbf-' + popValue + '-wrapper';
    console.log(newValue);
    let memberUpdateWrapper = document.getElementById(newValue);
    memberUpdateWrapper.style.display = "none";
    setTimeout(deactivateBodyHide, 2);
    function deactivateBodyHide() {
    let ftbfBody = document.getElementById('ftbf-body');
    ftbfBody.style.display = "block";
    let adminPanelTwo = document.getElementById('ftbf-switch-admin-panel-two');
    adminPanelTwo.style.display = "block";
}}

//Reveal community list

function popCommunity() {
    let adminPanelTwo = document.getElementById('ftbf-switch-admin-panel-two');
    adminPanelTwo.style.display = "block";
}