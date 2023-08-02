$(document).ready(function() {
    function populateAttributeValueSelect(attributeIds) {
        const url = `/admin/variant/get-attribute-values/${attributeIds.join(',')}`;
        const attributeValueSelect = $("#attribute-value-select");

        $.getJSON(url, function(data) {
            attributeValueSelect.empty();
            $.each(data, function(index, item) {
                attributeValueSelect.append($("<option>", {
                    value: item.id,
                    text: item.value
                }));
            });
        }).fail(function(jqxhr, textStatus, error) {
            console.error("Lỗi khi tải các giá trị thuộc tính:", error);
        });
    }

    // Thêm event listener cho các checkboxes thuộc tính
    $(".attribute-checkbox").on("change", function() {
        const selectedAttributeIds = $(".attribute-checkbox:checked").map(function() {
            return $(this).val();
        }).get();
        populateAttributeValueSelect(selectedAttributeIds);

    });
});
