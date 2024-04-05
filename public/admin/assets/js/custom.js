document.getElementsByClassName('btn-toggle')[0].addEventListener('click', function (event) {
    console.log('hi');
    document.getElementById("sideMenu").classList.toggle('hide');
    document.getElementById("dashboardContent").classList.toggle('fullwidth');
});
