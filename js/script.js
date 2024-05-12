function addData() {
  document.querySelector("#formData").onsubmit = (e) => {
    e.preventDefault();
    $.ajax({
      url: "include/config.php?status=add",
      type: "post",
      data: $("#formData").serialize(),
      success: (res) => {
        console.log(res);
        document.querySelector("#name").value = "";
        document.querySelector("#email").value = "";
        document.querySelector("#pass").value = "";
        showData();
      },
    });
  };
}

function showData() {
  $.ajax({
    url: "include/config.php?status=show",
    type: "get",
    success: (res) => {
      document.getElementById("tabledata").innerHTML = res;
    },
  });
}
showData();

function deleteData(id) {
  $.ajax({
    url: "include/config.php?status=delete&id=" + id,
    type: "get",
    success: (res) => {
      console.log(res);
      showData();
    },
  });
}

function editData(id) {
  $.ajax({
    url: "include/config.php?status=edit&id=" + id,
    type: "get",
    success: (res) => {
      let data = JSON.parse(res);
      document.getElementById("name").value = data.std_name;
      document.getElementById("email").value = data.std_email;
      document.getElementById("pass").value = data.std_pass;
      document.getElementById("id").value = id;
      document.getElementById("updatebuttons").classList.remove("d-none");
      document.getElementById("btnadd").classList.add("d-none");
    },
  });
}

function updateData() {
  let id = document.getElementById("id").value;
  document.querySelector("#formData").onsubmit = (e) => {
    e.preventDefault();
    $.ajax({
      url: "include/config.php?status=update&id=" + id,
      type: "post",
      data: $("#formData").serialize(),
      success: (res) => {
        document.querySelector("#name").value = "";
        document.querySelector("#email").value = "";
        document.querySelector("#pass").value = "";
        document.querySelector("#id").value = "";
        document.getElementById("updatebuttons").classList.add("d-none");
        document.getElementById("btnadd").classList.remove("d-none");
        showData();
      },
    });
  };
}

function cancelData() {
  document.getElementById("name").value = "";
  document.getElementById("email").value = "";
  document.getElementById("pass").value = "";
  document.getElementById("id").value = "";
  document.getElementById("updatebuttons").classList.add("d-none");
  document.getElementById("btnadd").classList.remove("d-none");
}
