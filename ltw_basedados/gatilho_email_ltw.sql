CREATE TRIGGER trg_user_email_format
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
    SELECT
        CASE
            WHEN NEW.email NOT LIKE '%_@_%._%' OR NEW.email LIKE '% %' THEN
                RAISE (ABORT, 'Invalid email format or contains spaces')
        END;
END;