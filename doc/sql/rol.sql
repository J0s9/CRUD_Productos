-- LISTAR ROL POR ID
CREATE OR REPLACE FUNCTION public.func_rol_r(id integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		r."ID",
		r.rol
		FROM tm_rol r
		INNER JOIN tm_sucursal s ON r.sucursal = s."ID"
		WHERE
		r."ID"   = id
		AND
		r.estado = TRUE
	)r;
	
END;
$function$

-- LISTAR ROL POR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_rol_sucursal(suc integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		r."ID",
		r.rol
		FROM tm_rol r
		INNER JOIN tm_sucursal s ON r.sucursal = s."ID"
		WHERE
		r.sucursal = suc
		AND
		r.estado   = TRUE
	)r;
END;
$function$

-- CREAR ROL
CREATE OR REPLACE FUNCTION public.func_rol_c(suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_rol (sucursal, rol, creacion, estado)
	VALUES (suc, UPPER(name), NOW(), TRUE);
END;
$function$

-- ACTUALIZAR ROL
CREATE OR REPLACE FUNCTION public.func_rol_u(id integer, suc integer, name character varying)
	RETURNS void
	LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_rol
	SET
	sucursal = suc,
	rol 	 = UPPER(name)
	WHERE
	"ID"     = id;
END;
$function$

-- ELIMINAR ROL
CREATE OR REPLACE FUNCTION public.func_rol_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_rol
	SET estado = FALSE
	WHERE
	"ID" 	   = id;
END;
$function$