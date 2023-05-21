CREATE TRIGGER check_password_length
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
    SELECT
        CASE
            WHEN NEW.pass IS NULL THEN
                RAISE (ABORT, 'Password cannot be NULL.')
            WHEN LENGTH(NEW.pass) < 8 OR NEW.pass LIKE '% %' THEN
                RAISE (ABORT, 'Password must have at least 8 characters and cannot contain spaces.')
        END;
END;