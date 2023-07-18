const editSelectors = {
    links: {
        wrapper: '.links-wrapper',
        item: '.links-item',
        removeBtn: '.remove-link',
        addBtn: '.add-link'
    }
};

$(document).on('click', editSelectors.links.removeBtn, function(e) {
    e.preventDefault();
    $(this).parent().remove();
});

$(document).on('click', editSelectors.links.addBtn, function(e) {
    e.preventDefault();

    let lastKey = parseInt($(editSelectors.links.wrapper).data('last_key'));
    lastKey++;

    const template = `` +
        `<div class="input-group mb-3 links-item" data-key="${lastKey}">
        <input type="text" aria-label="href" name="links[${lastKey}][href]" class="form-control" />
        <input type="text" aria-label="href" name="links[${lastKey}][text]" class="form-control" />
        <button class="btn btn-outline-danger remove-link" type="button" id="button-addon2"><i class="fa-solid fa-xmark"></i></button>
    </div>`;

    $(editSelectors.links.wrapper).append(template);
    $(editSelectors.links.wrapper).data('last_key', lastKey);
});
