document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.menu li').forEach(function(li) {
        li.addEventListener('click', function(event) {
            event.stopPropagation();
            let childUl = this.querySelector('ul');
            if (childUl) {
                childUl.style.display = childUl.style.display === 'none' ? 'block' : 'none';
            }
        });
    });
});
