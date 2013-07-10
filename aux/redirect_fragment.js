hash = window.location.hash;
qs = hash.replace('#', '?');
//url = "http://localhost:" + _to_port + "/auth.php" + qs;
url = _to_prefix + qs;
window.location.href = url;
