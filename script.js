function openTab(tabId){
    let activeTab = document.getElementsByClassName('tabcontent active')[0];
    activeTab.className = 'tabcontent';

    let toOpen = document.getElementById(tabId);
    toOpen.className="tabcontent active";

    let tab = document.getElementsByClassName('tablinks active')[0];
    tab.className = 'tablinks';

    let opening = document.getElementById('tab-'+tabId);
    opening.className = 'tablinks active';
}