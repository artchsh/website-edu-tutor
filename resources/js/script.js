function check() {
    console.log("checked")
    var pwd = document.getElementById("pwd").value
    var uname = document.getElementById("uname").value
    console.log(pwd, uname)
    if (uname == "root" && pwd == "root") {
        document.write("")
    }
  }