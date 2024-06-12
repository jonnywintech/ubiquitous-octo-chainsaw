<?php

// helpers.php

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        header('Content-Type: text/html');
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Debug Dump</title><style>
        body { font-family: "Courier New", Courier, monospace; background: #2e2d2c; color: #0f0; }
        .container { margin: 20px; }
        .json-viewer { white-space: pre; background: #1d1d1d; color: #0f0; padding: 10px; border: 1px solid #0f0; }
                .json-key { font-weight: bold; color: #0f0; }
                .json-string { color: #0f0; }
                .json-number { color: #0f0; }
                .json-boolean { color: #0f0; }
                .json-null { color: #0f0; }
                .toggle { cursor: pointer; display: inline-block; color: #0f0; }
                .nested { margin-left: 20px; display: none; }
              </style></head><body><div class="container">';
        echo '<div class="json-viewer">';
        foreach ($vars as $var) {
            echo '<div>' . htmlspecialchars(json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), ENT_QUOTES, 'UTF-8') . '</div>';
        }
        echo '</div>';
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".json-viewer").forEach(function(viewer) {
                        viewer.innerHTML = syntaxHighlight(viewer.textContent);
                    });

                    document.querySelectorAll(".toggle").forEach(function(element) {
                        var sibling = element.nextElementSibling;
                        sibling.style.display = "none"; // Ensure the nested element is hidden initially
                        element.addEventListener("click", function() {
                            if (sibling.style.display === "none") {
                                sibling.style.display = "block";
                                element.textContent = "-";
                            } else {
                                sibling.style.display = "none";
                                element.textContent = "+";
                            }
                        });
                    });
                });

                function syntaxHighlight(json) {
                    if (typeof json != "string") {
                        json = JSON.stringify(json, undefined, 2);
                    }
                    json = json.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    json = json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:\s*)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?|=>)/g, function(match) {
                        var cls = "json-number";
                        if (/^"/.test(match)) {
                            if (/:$/.test(match)) {
                                cls = "json-key";
                            } else {
                                cls = "json-string";
                            }
                        } else if (/true|false/.test(match)) {
                            cls = "json-boolean";
                        } else if (/null/.test(match)) {
                            cls = "json-null";
                        } else if (match === "=>") {
                            cls = "operator";
                        }
                        return "<span class=\"" + cls + "\">" + match + "</span>";
                    });
                    return json.replace(/({|}|\[|\])/g, function(match) {
                        if (match === "{" || match === "[") {
                            return match + "<span class=\"toggle\">+</span><div class=\"nested\">";
                        } else if (match === "}" || match === "]") {
                            return "</div>" + match;
                        }
                        return match;
                    });
                }
              </script></div></body></html>';
        die(1);
    }
}

if (!function_exists('ddd')) {
    function ddd(...$vars)
    {
        header('Content-Type: text/html');
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Debug Dump</title><style>
    body { font-family: "Courier New", Courier, monospace; background: #2e2d2c; color: #0f0; }
    .container { margin: 20px; }
    .dump-output { background: #1d1d1d; color: #0f0; padding: 10px; border: 1px solid #0f0; }
    </style></head><body><div class="container">';

        echo '<div class="dump-output">';
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
        echo '</div>';
        echo '</div></body></html>';
        die(1);
    }
}

if (!function_exists('dump')) {
    function dump(...$vars)
    {
        header('Content-Type: text/html');
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Debug Dump</title><style>
        body { font-family: "Courier New", Courier, monospace; background: #2e2d2c; color: #0f0; }
        .container { margin: 20px; }
        .json-viewer { white-space: pre; background: #1d1d1d; color: #0f0; padding: 10px; border: 1px solid #0f0; }
                .json-key { font-weight: bold; color: #0f0; }
                .json-string { color: #0f0; }
                .json-number { color: #0f0; }
                .json-boolean { color: #0f0; }
                .json-null { color: #0f0; }
                .toggle { cursor: pointer; display: inline-block; color: #0f0; }
                .nested { margin-left: 20px; display: none; }
              </style></head><body><div class="container">';
        echo '<div class="json-viewer">';
        foreach ($vars as $var) {
            echo '<div>' . htmlspecialchars(json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), ENT_QUOTES, 'UTF-8') . '</div>';
        }
        echo '</div>';
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".json-viewer").forEach(function(viewer) {
                        viewer.innerHTML = syntaxHighlight(viewer.textContent);
                    });

                    document.querySelectorAll(".toggle").forEach(function(element) {
                        var sibling = element.nextElementSibling;
                        sibling.style.display = "none"; // Ensure the nested element is hidden initially
                        element.addEventListener("click", function() {
                            if (sibling.style.display === "none") {
                                sibling.style.display = "block";
                                element.textContent = "-";
                            } else {
                                sibling.style.display = "none";
                                element.textContent = "+";
                            }
                        });
                    });
                });

                function syntaxHighlight(json) {
                    if (typeof json != "string") {
                        json = JSON.stringify(json, undefined, 2);
                    }
                    json = json.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
                    json = json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:\s*)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?|=>)/g, function(match) {
                        var cls = "json-number";
                        if (/^"/.test(match)) {
                            if (/:$/.test(match)) {
                                cls = "json-key";
                            } else {
                                cls = "json-string";
                            }
                        } else if (/true|false/.test(match)) {
                            cls = "json-boolean";
                        } else if (/null/.test(match)) {
                            cls = "json-null";
                        } else if (match === "=>") {
                            cls = "operator";
                        }
                        return "<span class=\"" + cls + "\">" + match + "</span>";
                    });
                    return json.replace(/({|}|\[|\])/g, function(match) {
                        if (match === "{" || match === "[") {
                            return match + "<span class=\"toggle\">+</span><div class=\"nested\">";
                        } else if (match === "}" || match === "]") {
                            return "</div>" + match;
                        }
                        return match;
                    });
                }
              </script></div></body></html>';
    }
}

if (!function_exists('form_method')) {
    function form_method(string $method): string
    {
        $method = strtolower($method);
        return '<input type="hidden" name="_method" value="' . $method . '">';
    }
}
