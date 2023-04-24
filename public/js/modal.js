function openCreateModal() {
    if (validateForm()) {
        const onsenName = document.querySelector("input[name='onsenName']").value;
        const area = document.querySelector("select[name='area']").value;
        const star = document.querySelector("select[name='star']").value;
        const time = document.querySelector("select[name='time']").value;
        const content = document.querySelector("textarea[name='content']").value;

        const modal = document.getElementById("modal");
        const modalContent = document.getElementById("modalContent");

        modalContent.innerHTML = `
            <p class="mb-2"><strong>温泉名:</strong> ${onsenName}</p>
            <p class="mb-2"><strong>都道府県:</strong> ${area}</p>
            <p class="mb-2"><strong>レビュー点数:</strong> ${star}</p>
            <p class="mb-2"><strong>時間帯:</strong> ${time}</p>
            <p class="mb-2"><strong>レビュー詳細:</strong> ${content}</p>
        `;

        modal.classList.remove("hidden");
    }
}

function openEditModal() {
    const onsenName = document.querySelector("input[name='onsenName']").value;
    const star = document.querySelector("select[name='star']").value;
    const time = document.querySelector("select[name='time']").value;
    const content = document.querySelector("textarea[name='content']").value;

    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = `
    <p class="mb-2"><strong>温泉名:</strong> ${onsenName}</p>
    <p class="mb-2"><strong>レビュー点数:</strong> ${star}</p>
    <p class="mb-2"><strong>時間帯:</strong> ${time}</p>
    <p class="mb-2"><strong>レビュー詳細:</strong> ${content}</p>
    `;

    document.getElementById("modal").classList.remove("hidden");
}

function validateForm() {
    let hasError = false;
    let errorMessage = "";

    const onsenName = document.getElementsByName("onsenName")[0];
    const area = document.getElementsByName("area")[0];
    const star = document.getElementsByName("star")[0];
    const time = document.getElementsByName("time")[0];
    const content = document.getElementsByName("content")[0];
    const tag = document.getElementsByName("tag")[0];

    if (!area.value) {
        errorMessage += "・都道府県を選択してください。\n";
        hasError = true;
    }

    if (!onsenName.value) {
        errorMessage += "・温泉名を入力してください。\n";
        hasError = true;
    }

    if (!star.value) {
        errorMessage += "・レビュー点数を選択してください。\n";
        hasError = true;
    }

    if (!time.value) {
        errorMessage += "・時間帯を選択してください。\n";
        hasError = true;
    }

    if (!content.value) {
        errorMessage += "・レビュー詳細を入力してください。\n";
        hasError = true;
    }

    if (!tag.value) {
        errorMessage += "・タグを入力してください。\n";
        hasError = true;
    }

    if (hasError) {
        const errorContainer = document.createElement("div");
        errorContainer.classList.add("mb-5", "bg-orange-100", "border-t", "border-b", "border-orange-500", "text-orange-700", "px-4", "py-3");
        errorContainer.setAttribute("role", "alert");

        const errorList = document.createElement("ul");
        const errors = errorMessage.split("\n");

        errors.forEach((error) => {
            if (error) {
                const listItem = document.createElement("li");
                listItem.textContent = error;
                errorList.appendChild(listItem);
            }
        });

        errorContainer.appendChild(errorList);

        const form = document.getElementById("review-form");
        const formError = form.querySelector(".error-message");

        if (formError) {
            formError.remove();
        }

        form.insertBefore(errorContainer, form.firstChild);
        errorContainer.scrollIntoView();
    }

    return !hasError;
}



function submitReview() {
    document.getElementById("modal").classList.add("hidden");
    document.getElementById("review-form").submit();
}

function cancelModal() {
    document.getElementById("modal").classList.add("hidden");
}

function openModal() {
    var modal = document.getElementById("modal");
    modal.classList.remove("hidden");
}

function closeModal(event) {
    var modal = document.getElementById("modal");
    var modalContent = document.getElementById("modalContent");
    if (event.target !== modalContent && !modalContent.contains(event.target)) {
        modal.classList.add("hidden");
    }
}
