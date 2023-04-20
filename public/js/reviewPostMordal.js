
function openCreateModal() {

    const onsenName = document.querySelector("input[name='onsenName']").value;
    const area = document.querySelector("select[name='area']").value;
    const star = document.querySelector("select[name='star']").value;
    const time = document.querySelector("select[name='time']").value;
    const content = document.querySelector("textarea[name='content']").value;

    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = `
    <p><strong>温泉名:</strong> ${onsenName}</p>
    <p><strong>都道府県:</strong> ${area}</p>
    <p><strong>レビュー点数:</strong> ${star}</p>
    <p><strong>時間帯:</strong> ${time}</p>
    <p><strong>レビュー詳細:</strong> ${content}</p>
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
    <p><strong>温泉名:</strong> ${onsenName}</p>
    <p><strong>レビュー点数:</strong> ${star}</p>
    <p><strong>時間帯:</strong> ${time}</p>
    <p><strong>レビュー詳細:</strong> ${content}</p>
    `;

    document.getElementById("modal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("modal").classList.add("hidden");
}

function submitReview() {
    document.getElementById("modal").classList.add("hidden");
    document.getElementById("review-form").submit();
}
