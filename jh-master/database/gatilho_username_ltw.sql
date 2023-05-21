CREATE TRIGGER check_username
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
    SELECT
        CASE
            WHEN NEW.username IS NULL THEN
                RAISE (ABORT, 'Username cannot be NULL.')
            WHEN NEW.username LIKE '% %' THEN
                RAISE (ABORT, 'Username cannot contain spaces.')
        END;
END;