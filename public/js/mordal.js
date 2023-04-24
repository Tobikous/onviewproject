
function openCreateModal() {

    const onsenName = document.querySelector("input[name='onsenName']").value;
    const area = document.querySelector("select[name='area']").value;
    const star = document.querySelector("select[name='star']").value;
    const time = document.querySelector("select[name='time']").value;
    const content = document.querySelector("textarea[name='content']").value;

    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = `
    <p class="mb-2"><strong>温泉名:</strong> ${onsenName}</p>
    <p class="mb-2"><strong>都道府県:</strong> ${area}</p>
    <p class="mb-2"><strong>レビュー点数:</strong> ${star}</p>
    <p class="mb-2"><strong>時間帯:</strong> ${time}</p>
    <p class="mb-2"><strong>レビュー詳細:</strong> ${content}</p>
    `;

    document.getElementById("modal").classList.remove("hidden");
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
