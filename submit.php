<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ── Sanitise all inputs ───────────────────────────────────────
    $name    = strip_tags(trim($_POST['name']    ?? ''));
    $email   = filter_var(trim($_POST['email']   ?? ''), FILTER_SANITIZE_EMAIL);
    $phone   = strip_tags(trim($_POST['phone']   ?? ''));
    $service = strip_tags(trim($_POST['service'] ?? ''));
    $message = strip_tags(trim($_POST['message'] ?? ''));

    // ── Require at least a phone number ──────────────────────────
    if (empty($phone)) {
        echo "Please provide a phone number.";
        exit;
    }

    // ── Email settings ────────────────────────────────────────────
    $to      = "ma.roofingsolutionsltd@yahoo.com";
    $subject = "New Enquiry — MA Roofing Solutions";

    // ── Build the message ─────────────────────────────────────────
    $body  = "A new enquiry has been submitted via the website.\n\n";
    $body .= "----------------------------------------\n";

    if (!empty($name))    $body .= "Name:     " . $name    . "\n";
    if (!empty($email))   $body .= "Email:    " . $email   . "\n";
    if (!empty($phone))   $body .= "Phone:    " . $phone   . "\n";
    if (!empty($service)) $body .= "Service:  " . $service . "\n";
    if (!empty($message)) $body .= "\nMessage:\n" . $message . "\n";

    $body .= "----------------------------------------\n";
    $body .= "Sent from: maroofingsolutionsltd.com\n";

    // ── Headers ───────────────────────────────────────────────────
    // From address must be on the same domain as your hosting
    // to avoid emails being marked as spam. Update this to match.
    $headers  = "From: noreply@maroofingsolutionsltd.com\r\n";
    $headers .= "Reply-To: " . (!empty($email) ? $email : $phone) . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // ── Send ──────────────────────────────────────────────────────
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }

}
?>