const message = $(".flashData").data("message");
const tittle = $(".flashData").data("tittle");
const icon = $(".flashData").data("icon");
const flash = document.getElementById("flashData");

if (message && tittle && icon) {
	Swal.fire({
		icon: icon,
		title: tittle,
		text: message,
		showConfirmButton: false,
		timer: 10000,
	});
	flash.remove();
}

// ================== SWEETALERT BUTTON DELETE ==============================
$(".btnDelete").on("click", function (e) {
	e.preventDefault();

	const href = $(this).attr("href");

	const Delete = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger cancelBtn",
		},
		buttonsStyling: false,
	});

	Delete.fire({
		title: "Kamu yakin?",
		text: "Data yang sudah dihapus tidak bisa kembali!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel!",
		reverseButtons: true,
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			Delete.fire("Cancelled", "Data tidak jadi dihapus!", "error");
		}
	});

	const cancelBtn = document.querySelector(".cancelBtn");
	cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON DELETE ==============================

// ================== SWEETALERT BUTTON CHANGE STATUS ORDER ==============================
$(".btnChangeStatus").on("click", function (e) {
	e.preventDefault();

	const href = $(this).attr("href");

	const Delete = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger cancelBtn",
		},
		buttonsStyling: false,
	});

	Delete.fire({
		title: "Kamu yakin?",
		text: "Status akan diubah menjadi sukses.",
		icon: "question",
		showCancelButton: true,
		confirmButtonText: "Yes, change it!",
		cancelButtonText: "No, cancel!",
		reverseButtons: true,
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			Delete.fire("Cancelled", "Status tidak jadi diubah!", "error");
		}
	});

	const cancelBtn = document.querySelector(".cancelBtn");
	cancelBtn.style.marginRight = "15px";
});
// ================== SWEETALERT BUTTON CHANGE STATUS ORDER ==============================
