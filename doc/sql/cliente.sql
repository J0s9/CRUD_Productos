-- LISTAR CLIENTE POR ID
CREATE OR REPLACE FUNCTION func_cliente_r(code INTEGER)
RETURNS TABLE (RESULT JSON)
AS $$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		c."ID",
		c.cliente,
		c.ruc,
		c.telefono,
		c.direccion,
		c.correo
		FROM tm_cliente c
		INNER JOIN tm_empresa e ON c.empresa = e."ID"
		WHERE
		c."ID"   = code
		AND
		c.estado = TRUE
	)r;
END;
$$LANGUAGE PLPGSQL;

-- LISTAR CLIENTE POR EMPRESA
CREATE OR REPLACE FUNCTION public.func_cliente_empresa(emp integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
	SELECT
	c."ID",
	c.cliente,
	c.ruc,
	c.telefono,
	c.direccion,
	c.correo
	FROM tm_cliente c
	INNER JOIN tm_empresa e ON c.empresa = e."ID"
	WHERE
	c.empresa = emp
	AND
	c.estado  = TRUE
	)r;
END;
$function$

-- CREAR CLIENTE
CREATE OR REPLACE FUNCTION public.func_cliente_c(emp integer, cli character varying, ruc character varying, tlf character varying, direc character varying, email character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_cliente(empresa,cliente, ruc, telefono, direccion, correo, creacion, estado)
	VALUES(emp,UPPER(cli),ruc,tlf,UPPER(direc),email,now(),TRUE );
END;
$function$

-- ACTUALIZAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_cliente_u(id integer, emp integer, cli character varying, r character varying, tlf character varying, direc character varying, email character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_cliente
	SET
	empresa   = emp,
	cliente   = upper(cli),
	ruc 	  = r,
	telefono  = tlf,
	direccion = upper(direc),
	correo    = email
	WHERE
	"ID" = id;
END;
$function$

-- ELIMINAR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_cliente_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_cliente c
	SET estado = FALSE
	WHERE
	c."ID"     = id;
END;
$function$
