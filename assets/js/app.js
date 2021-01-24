const iban = document.querySelector("#iban-input");

const URL = `http://localhost:8000/api/index.php?iban=`;

const fetchResult = () => {
    fetch(URL + iban.value)
        .then(resp => resp.json())
        .then(data => validateIban(data))
        .catch(err => console.error(`Error: ${err.message}`));
}

const validateIban = (respData) => {

    if (respData.valid) {
        document.querySelector(".invalid-iban").style.display = "none";
        document.querySelector(".info-table").style.display = "flex";
        document.querySelector(".is-valid").innerText = "VALID";
        
        document.querySelector(".sum-up strong").innerText = respData.iban;
        document.querySelector(".data-iban").innerText = respData.iban;
        document.querySelector(".data-country").innerText = respData.country;
        document.querySelector(".data-iso").innerText = respData.countryISO;
        document.querySelector(".data-valid").innerText = respData.valid;
        document.querySelector(".data-timestamp").innerText = respData.timestamp;
    }else {
        document.querySelector(".info-table").style.display = "none";
        document.querySelector(".invalid-iban").style.display = "flex";
        document.querySelector(".is-invalid").innerText = "INVALID";
        
        document.querySelector(".invalid-iban p strong").innerText = document.querySelector("#iban-input").value
    }
}

document.querySelector(".sub-bttn").addEventListener("click", () => {
    fetchResult();
})