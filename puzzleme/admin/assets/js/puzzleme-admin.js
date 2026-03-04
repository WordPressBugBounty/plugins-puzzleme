(function () {
    "use strict";

    function setButtonState(button, label) {
        button.textContent = label;
        window.setTimeout(function () {
            button.textContent = "Copy";
        }, 1500);
    }

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }

        return new Promise(function (resolve, reject) {
            var textarea = document.createElement("textarea");
            textarea.value = text;
            textarea.setAttribute("readonly", "");
            textarea.style.position = "absolute";
            textarea.style.left = "-9999px";
            document.body.appendChild(textarea);
            textarea.select();

            try {
                var successful = document.execCommand("copy");
                document.body.removeChild(textarea);
                if (successful) {
                    resolve();
                    return;
                }
            } catch (err) {
                document.body.removeChild(textarea);
                reject(err);
                return;
            }

            reject(new Error("Copy command failed"));
        });
    }

    function initCopyShortcodeButtons() {
        var buttons = document.querySelectorAll(".puzzleme-copy-shortcode");
        if (!buttons.length) {
            return;
        }

        buttons.forEach(function (button) {
            button.addEventListener("click", function () {
                var box = button.closest(".puzzleme-shortcode-box");
                if (!box) {
                    setButtonState(button, "Error");
                    return;
                }

                var pre = box.querySelector("pre");
                if (!pre) {
                    setButtonState(button, "Error");
                    return;
                }

                var code = pre.querySelector("code");
                if (!code) {
                    setButtonState(button, "Error");
                    return;
                }

                copyText(code.textContent.trim())
                    .then(function () {
                        setButtonState(button, "Copied");
                    })
                    .catch(function () {
                        setButtonState(button, "Error");
                    });
            });
        });
    }

    initCopyShortcodeButtons();
})();
