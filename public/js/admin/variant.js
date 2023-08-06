$(document).ready(function() {
    function populateAttributeValueSelect(attributeId, attributeValueSelect) {
        // If attributeId is empty, clear the attributeValueSelect and return
        if (!attributeId) {
            attributeValueSelect.empty();
            return;
        }

        const url = `/admin/variant/get-attribute-values/${attributeId}`;

        $.getJSON(url, function(data) {
            attributeValueSelect.empty();
            // Add "No select" option first
            attributeValueSelect.append($("<option>", {
                value: "",
                text: "No select"
            }));
            // Populate other attribute values
            $.each(data, function(index, item) {
                attributeValueSelect.append($("<option>", {
                    value: item.id + '-' + item.value,
                    text: item.value
                }));
            });
        }).fail(function(jqxhr, textStatus, error) {
            console.error("Error fetching attribute values:", error);
        });
    }

    // Add event listener for the attribute select 1
    $("#attribute-select-1").on("change", function() {
        const selectedAttributeId = $(this).val();
        const attributeValueSelect = $("#attribute-value-select-1");
        populateAttributeValueSelect(selectedAttributeId, attributeValueSelect);
    });

    // Add event listener for the attribute select 2
    $("#attribute-select-2").on("change", function() {
        const selectedAttributeId = $(this).val();
        const attributeValueSelect = $("#attribute-value-select-2");
        populateAttributeValueSelect(selectedAttributeId, attributeValueSelect);
    });

    // Initialize the attribute value selects with "No select" options
    const attributeValueSelect1 = $("#attribute-value-select-1");
    const attributeValueSelect2 = $("#attribute-value-select-2");
    attributeValueSelect1.append($("<option>", {
        value: "",
        text: "No select"
    }));
    attributeValueSelect2.append($("<option>", {
        value: "",
        text: "No select"
    }));
});
