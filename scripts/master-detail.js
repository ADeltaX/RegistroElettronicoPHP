const detail = document.querySelector('.detail');
const detailTitle = document.querySelector('.detail-title');
const detailContent = document.querySelector('#detail-content');
const masterItems = document.querySelectorAll('.master-item');

function select(selected, data, contenuto){
    //Remove active class from all master-items
    for(var item of masterItems){
        item.classList.remove('active-item');
    }
    //Make selected tab active
    selected.classList.add('active-item');
    //Toggle the class that hides when the screen is medium size or less
    detail.classList.remove('hidden-md-down');
    //Set the title of the detail to the innerHTML of the selected item
    detailTitle.innerHTML = selected.innerHTML;
    //Set the content [...]
    detailContent.innerHTML = contenuto;
}

function back(){
    //Remove active class from all master-items
    for(var item of masterItems){
        item.classList.remove('active-item');
    }
    detail.classList.add('hidden-md-down');
}