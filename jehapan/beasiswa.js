function caridata() {
    let params = new URLSearchParams(window.location.search);
    let nim = params.get("nim");

    let urltarget = "server/beasiswabynim.php"; 
    let data = `nim=${nim}`;

    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: data,
        success: function(response) {
            $("#txNIM").val(response["isi"]["nim"]);
            $("#txNAMA").val(response["isi"]["nama"]);
            $("#txPRODI").val(response["isi"]["prodi"]);
            $("#txBEASISWA").val(response["isi"]["jenis_beasiswa"]);
            $("#txTEMPAT").val(response["isi"]["tempat_lahir"]);

            // Konversi format tanggal jika perlu (misal dari DD/MM/YYYY)
            let rawTgl = response["isi"]["tanggal_lahir"];
            let tglFormatted = formatTanggalUntukInput(rawTgl);
            $("#txTANGGAL").val(tglFormatted);

            $("#txJK").val(response["isi"]["jenis_kelamin"]);
        },
        error: function() {
            $("#gagal").show();
        }
    });
}

// Fungsi bantu untuk konversi ke format YYYY-MM-DD
function formatTanggalUntukInput(tgl) {
    // Jika format sudah YYYY-MM-DD, kembalikan langsung
    if (tgl.includes("-")) return tgl;

    // Jika format DD/MM/YYYY atau MM/DD/YYYY
    let parts = tgl.includes("/") ? tgl.split("/") : [tgl]; // backup jika error

    if (parts.length === 3) {
        // Asumsikan DD/MM/YYYY → konversi ke YYYY-MM-DD
        let day = parts[0].padStart(2, '0');
        let month = parts[1].padStart(2, '0');
        let year = parts[2];
        return `${year}-${month}-${day}`;
    }

    return ""; // fallback jika format aneh
}
